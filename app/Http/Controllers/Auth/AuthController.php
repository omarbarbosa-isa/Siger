<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class AuthController extends Controller
{
    // ==========================================
    // LOGIN & LOGOUT
    // ==========================================

   public function showLogin(): View
    {
        return view('pages.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors([
                'email' => 'As credenciais fornecidas não conferem com os nossos registos.',
            ])->onlyInput('email');
        }

        $user = Auth::user();

        // Bloqueio caso o utilizador ainda não tenha confirmado o e-mail
        if (is_null($user->email_verified_at)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Gera e envia novo OTP
            $this->generateAndSendOtp($user->email, 'registration');

            return redirect()->route('otp.verify.show')
                ->with('email', $user->email)
                ->with('type', 'registration')
                ->with('warning', 'O seu email ainda não foi confirmado. Enviámos um novo código de validação.');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.index'));
    }

    
public function logout(Request $request): RedirectResponse
{
    // Terminar a autenticação do utilizador
    Auth::guard('web')->logout();

    // Invalidar completamente a sessão actual
    $request->session()->flush();
    $request->session()->invalidate();

    // Gerar um novo token CSRF
    $request->session()->regenerateToken();

    // Voltar à landing page
    return redirect()->route('landing.page')
        ->with('info', 'Sessão encerrada com sucesso.');
}


    // ==========================================
    // REGISTO
    // ==========================================

    public function showRegister(): View
    {
        return view('pages.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50', 'alpha_dash', 'unique:users,username'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name'              => $data['name'],
            'surname'           => $data['surname'],
            'username'          => $data['username'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'email_verified_at' => null, // Deslogado e não confirmado
        ]);

        $this->generateAndSendOtp($data['email'], 'registration');

        return redirect()->route('otp.verify.show')
            ->with('email', $data['email'])
            ->with('type', 'registration')
            ->with('success', 'Conta criada! Insira o código de 6 dígitos enviado para o seu e-mail.');
    }

    // ==========================================
    // VERIFICAÇÃO OTP (CONFIRMAÇÃO DE CONTA)
    // ==========================================

    public function showVerifyOtp(): View|RedirectResponse
    {
        $email = session('email');
        $type = session('type', 'registration');

        if (!$email) {
            return redirect()->route('login');
        }

        return view('pages.auth.otp', compact('email', 'type'));
    }

    

public function verifyRegistrationOtp(Request $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'email'],
        'code' => ['required', 'string', 'size:6'],
        'type' => ['nullable', 'in:registration,login'],
    ]);

    $type = $request->input('type', session('type', 'registration'));

    $otpRecord = DB::table('otps')
        ->where('email', $request->email)
        ->where('type', $type)
        ->where('expires_at', '>', Carbon::now())
        ->latest()
        ->first();

    if (!$otpRecord || !Hash::check($request->code, $otpRecord->code)) {
        return back()
            ->with('email', $request->email)
            ->with('type', $type)
            ->withErrors([
                'code' => 'O código inserido é inválido ou já expirou.',
            ]);
    }

    $user = User::where('email', $request->email)->firstOrFail();

    DB::table('otps')
        ->where('email', $request->email)
        ->where('type', $type)
        ->delete();

    if ($type === 'registration') {
        $user->forceFill([
            'email_verified_at' => Carbon::now(),
        ])->save();

        Auth::logout();

        return redirect()->route('auth.success')
            ->with('success_message', 'Conta criada e e-mail confirmado com sucesso! Já pode iniciar sessão.');
    }

    // OTP de login: iniciar sessão apenas após validar o código.
    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('dashboard.index')
        ->with('success', 'Código validado! Sessão iniciada com sucesso.');
}



    public function resendOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'type'  => ['required', 'in:registration,password_reset'],
        ]);

        $this->generateAndSendOtp($request->email, $request->type);

        return back()
            ->with('email', $request->email)
            ->with('type', $request->type)
            ->with('success', 'Um novo código foi enviado para o seu e-mail.');
    }

    // ==========================================
    // RECUPERAÇÃO DE SENHA POR OTP
    // ==========================================

    public function showForgotPassword(): View
    {
        return view('pages.auth.pass-recover');
    }

    public function sendResetOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'Não encontramos nenhuma conta associada a este e-mail.',
        ]);

        $this->generateAndSendOtp($request->email, 'password_reset');

        return redirect()->route('new-pass')
            ->with('email', $request->email);
    }

    public function showResetPasswordWithOtp(): View|RedirectResponse
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('password.request');
        }

        return view('pages.auth.reset-pass-otp', compact('email'));
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'email'                 => ['required', 'email', 'exists:users,email'],
            'code'                  => ['required', 'string', 'size:6'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $otpRecord = DB::table('otps')
            ->where('email', $request->email)
            ->where('type', 'password_reset')
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if (!$otpRecord || !Hash::check($request->code, $otpRecord->code)) {
            return back()
                ->with('email', $request->email)
                ->withErrors(['code' => 'Código de verificação inválido ou expirado.']);
        }

        $user = User::where('email', $request->email)->first();

        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        DB::table('otps')
            ->where('email', $request->email)
            ->where('type', 'password_reset')
            ->delete();

        Auth::logout();

        return redirect()->route('auth.success')
            ->with('success_message', 'A sua palavra-passe foi alterada com sucesso! Utilize as novas credenciais para aceder.');
    }

    // ==========================================
    // PÁGINA DE SUCESSO (ESTADO: DESLOGADO)
    // ==========================================

    public function success(): View
    {
        return view('pages.auth.success_page1');
    }

    // ==========================================
    // HELPER PRIVADO DE GERAÇÃO OTP
    // ==========================================

    private function generateAndSendOtp(string $email, string $type): void
    {
        // Invalida OTPs anteriores pendentes deste tipo
        DB::table('otps')
            ->where('email', $email)
            ->where('type', $type)
            ->delete();

        // Gera código numérico de 6 dígitos seguro
        $code = (string) random_int(100000, 999999);

        DB::table('otps')->insert([
            'email'      => $email,
            'code'       => Hash::make($code),
            'type'       => $type,
            'expires_at' => Carbon::now()->addMinutes(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Dispara e-mail via canal On-Demand
        Notification::route('mail', $email)
            ->notify(new SendOtpNotification($code, $type));
    }
}