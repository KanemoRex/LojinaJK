<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TipoController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('tipo.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        Tipo::create($request->all());

        return redirect()->route('tipo.index')->with('success', 'Tipo criado com sucesso.');
    }

    public function show(Tipo $tipo)
    {
        return view('tipo.show', compact('tipo'));
    }

    public function edit(Tipo $tipo)
    {
        return view('tipo.edit', compact('tipo'));
    }

    public function update(Request $request, Tipo $tipo)
    {
        $request->validate([
            'nome' => 'required|max:255',
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipo.index')->with('success', 'Tipo atualizado com sucesso.');
    }

    public function destroy(Tipo $tipo)
    {
        $tipo->delete();

        return redirect()->route('tipo.index')->with('success', 'Tipo excluído com sucesso.');
    }
}
