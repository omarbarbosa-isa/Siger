<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        return view('pages.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('pages.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric|min:0',
            'categoria'  => 'nullable|string|max:255',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'disponivel' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('menus/photos', 'public');
        }

        $validated['disponivel'] = $request->has('disponivel');

        Menu::create($validated);

        return redirect()->route('menu.index')->with('success', 'Item do menu criado com sucesso!');
    }

    public function show(Menu $menu)
    {
        return view('pages.menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('pages.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nome'       => 'required|string|max:255',
            'descricao'  => 'nullable|string',
            'preco'      => 'required|numeric|min:0',
            'categoria'  => 'nullable|string|max:255',
            'foto'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'disponivel' => 'nullable|boolean',
        ]);

        if ($request->hasFile('foto')) {
            if ($menu->foto) {
                Storage::disk('public')->delete($menu->foto);
            }
            $validated['foto'] = $request->file('foto')->store('menu/photos', 'public');
        }

        $validated['disponivel'] = $request->has('disponivel');

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Item do menu atualizado com sucesso!');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->foto) {
            Storage::disk('public')->delete($menu->foto);
        }

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Item do menu removido com sucesso!');
    }
}