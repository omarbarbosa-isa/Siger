<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cozinha;
use App\Models\Menu;
use App\Models\Reserva;
use Illuminate\Http\Request;

class CozinhaController extends Controller
{
    public function index()
    {
        $pedidos = Cozinha::with(['reserva', 'menu'])->latest()->paginate(10);
        return view('pages.cozinha.index', compact('pedidos'));
    }

    public function create()
    {
        $reservas = Reserva::all();
        $menus = Menu::where('disponivel', true)->get();
        return view('pages.cozinha.create', compact('reservas', 'menus'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reserva_id'  => 'required|exists:reservas,id',
            'menu_id'     => 'required|exists:menus,id',
            'quantidade'  => 'required|integer|min:1',
            'status'      => 'required|string|max:255',
            'observacoes' => 'nullable|string',
        ]);

        Cozinha::create($validated);

        return redirect()->route('cozinha.index')->with('success', 'Pedido enviado para a cozinha!');
    }

    public function show(Cozinha $cozinha)
    {
        $cozinha->load(['reserva', 'menu']);
        return view('pages.cozinha.show', compact('cozinha'));
    }

    public function edit(Cozinha $cozinha)
    {
        $reservas = Reserva::all();
        $menus = Menu::all();
        return view('pages.cozinha.edit', compact('cozinha', 'reservas', 'menus'));
    }

    public function update(Request $request, Cozinha $cozinha)
    {
        $validated = $request->validate([
            'reserva_id'     => 'required|exists:reservas,id',
            'menu_id'        => 'required|exists:menus,id',
            'quantidade'     => 'required|integer|min:1',
            'status'         => 'required|string|max:255',
            'observacoes'    => 'nullable|string',
            'inicio_preparo' => 'nullable|date',
            'fim_preparo'    => 'nullable|date',
        ]);

        $cozinha->update($validated);

        return redirect()->route('cozinha.index')->with('success', 'Status do pedido atualizado!');
    }

    public function destroy(Cozinha $cozinha)
    {
        $cozinha->delete();

        return redirect()->route('cozinha.index')->with('success', 'Pedido cancelado e removido!');
    }
}