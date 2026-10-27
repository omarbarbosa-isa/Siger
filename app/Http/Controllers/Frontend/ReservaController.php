<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('user')->latest()->paginate(10);
        return view('pages.reservas.index', compact('reservas'));
    }

    public function create()
    {
        $users = User::all();
        return view('pages.reservas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id'        => 'required|exists:users,id',
            'numero_mesa'    => 'required|string|max:255',
            'data_reserva'   => 'required|date',
            'hora_reserva'   => 'required',
            'numero_pessoas' => 'required|integer|min:1',
            'status'         => 'required|string|max:255',
            'observacoes'    => 'nullable|string',
        ]);

        Reserva::create($validated);

        return redirect()->route('reservas.index')->with('success', 'Reserva criada com sucesso!');
    }

    public function show(Reserva $reserva)
    {
        $reserva->load('user', 'cozinhas.menu');
        return view('pages.reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $users = User::all();
        return view('pages.reservas.edit', compact('reserva', 'users'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'user_id'        => 'required|exists:users,id',
            'numero_mesa'    => 'required|string|max:255',
            'data_reserva'   => 'required|date',
            'hora_reserva'   => 'required',
            'numero_pessoas' => 'required|integer|min:1',
            'status'         => 'required|string|max:255',
            'observacoes'    => 'nullable|string',
        ]);

        $reserva->update($validated);

        return redirect()->route('reservas.index')->with('success', 'Reserva atualizada com sucesso!');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva removida com sucesso!');
    }
}