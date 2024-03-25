<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'classe' => 'required|max:255',
            'nivel' => 'required|integer|min:1|max:99',
            'vida' => 'required|integer|min:0',
            'mana' => 'required|integer|min:0',
            'forca' => 'required|integer|min:0',
            'agilidade' => 'required|integer|min:0',
            'inteligencia' => 'required|integer|min:0',
        ]);

        Cliente::create($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente criado com sucesso.');
    }

    public function show(Cliente $cliente)
    {
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'classe' => 'required|max:255',
            'nivel' => 'required|integer|min:1|max:99',
            'vida' => 'required|integer|min:0',
            'mana' => 'required|integer|min:0',
            'forca' => 'required|integer|min:0',
            'agilidade' => 'required|integer|min:0',
            'inteligencia' => 'required|integer|min:0',
        ]);

        $cliente->update($request->all());

        return redirect()->route('cliente.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
