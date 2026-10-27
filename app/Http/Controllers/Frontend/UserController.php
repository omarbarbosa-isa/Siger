<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('pages.users.index', compact('users'));
    }

      public function create (Request $request){
        return view('pages.users.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'surname'    => 'nullable|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username',
            'birth_date' => 'nullable|date',
            'category'   => 'nullable|string|max:255',
            'role'       => 'nullable|string|max:255',
            'gender'     => 'nullable|string|max:50',
            'contact'    => 'required|string|max:255|unique:users,contact',
            'adress'     => 'nullable|string|max:255',
            'email'      => 'required|email|max:255|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Trata o upload da fotografia
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('users/photos', 'public');
        }

        // Encriptação da palavra-passe
       
        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilizador criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user = User::findOrFail($id);
        return view('pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
       
        return view('pages.users.editar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = User::fundOrFail($user->id);

       $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'surname'    => 'nullable|string|max:255',
            'username'   => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'birth_date' => 'nullable|date',
            'category'   => 'nullable|string|max:255',
            'role'       => 'nullable|string|max:255',
            'gender'     => 'nullable|string|max:50',
            'contact'    => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'adress'     => 'nullable|string|max:255',
            'email'      => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password'   => 'nullable|string|min:8|confirmed',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Substituição da fotografia
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $validated['photo'] = $request->file('photo')->store('users/photos', 'public');
        }

        // Atualização opcional da palavra-passe
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('.users.show', $user->id)
            ->with('success', 'Utilizador atualizado com sucesso!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->photo && Storage::disk('public')->exists($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Utilizador removido com sucesso!');
    }
}
