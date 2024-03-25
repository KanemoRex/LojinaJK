<?php

namespace App\Http\Controllers;

use App\Models\Artefato;
use App\Models\Tipo;
use Illuminate\Http\Request;

class ArtefatoController extends Controller
{
    public function index()
    {
        $dados = Artefato::all();

        return view("artefato.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();

        return view("artefato.form", ['tipos' => $tipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => "required|max:100",
            'raridade' => "required",
            'sintonizacao' => "required",
            'tipo' => "required",
        ], [
            'nome.required' => "O nome é obrigatório",
            'nome.max' => "O nome não pode ter mais de 100 caracteres",
            'raridade.required' => "A raridade é obrigatória",
            'sintonizacao.required' => "A sintonização é obrigatória",
            'tipo.required' => "O tipo é obrigatório",
        ]);

        Artefato::create([
            'nome' => $request->nome,
            'raridade' => $request->raridade,
            'sintonizacao' => $request->sintonizacao,
            'tipo' => $request->tipo,
        ]);

        return redirect('artefato');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Artefato::findOrFail($id);
        $tipos = Tipo::all();

        return view("artefato.form", [
            'dado' => $dado,
            'tipos' => $tipos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => "required|max:100",
            'raridade' => "required",
            'sintonizacao' => "required",
            'tipo' => "required",
        ], [
            'nome.required' => "O nome é obrigatório",
            'nome.max' => "O nome não pode ter mais de 100 caracteres",
            'raridade.required' => "A raridade é obrigatória",
            'sintonizacao.required' => "A sintonização é obrigatória",
            'tipo.required' => "O tipo é obrigatório",
        ]);

        Artefato::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'raridade' => $request->raridade,
                'sintonizacao' => $request->sintonizacao,
                'tipo' => $request->tipo,
            ]
        );

        return redirect('artefato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Artefato::findOrFail($id);
        $dado->delete();

        return redirect('artefato');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Artefato::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->get();
        } else {
            $dados = Artefato::all();
        }

        return view("artefato.list", ["dados" => $dados]);
    }
}
