<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Registo
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Verificação OTP de Registo
    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('otp.verify.show');
    Route::post('/verify-otp', [AuthController::class, 'verifyRegistrationOtp'])->name('otp.verify');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('otp.resend');

    // Recuperação de Senha por OTP
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetOtp'])->name('password.email');
    Route::get('/reset-password-otp', [AuthController::class, 'showResetPasswordWithOtp'])->name('new-pass');
    Route::post('/reset-password-otp', [AuthController::class, 'resetPassword'])->name('password.reset.otp.update');

    // Sucesso (Acesso público / Deslogado)
    Route::get('/auth/success', [AuthController::class, 'success'])->name('auth.success');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');