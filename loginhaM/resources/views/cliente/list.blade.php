@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Clientes')

<h3>Listagem de Clientes</h3>

<form action="{{ route('cliente.search') }}" method="post">

    <div class="row">
        @csrf
        <div class="col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-4" style="margin-top: 22px;">
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            <a href="{{ route('cliente.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
        </div>
    </div>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Classe de RPG</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->classe_rpg }}</td>
                <td><a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-outline-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i> Editar</a></td>
                <td>
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" title="Deletar" onclick="return confirm('Deseja realmente deletar esse registro?')"><i class="fa-solid fa-trash-can"></i> Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
