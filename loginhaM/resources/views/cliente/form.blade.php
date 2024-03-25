@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Cliente')

@php
    if (!empty($cliente->id)) {
        $route = route('cliente.update', $cliente->id);
    } else {
        $route = route('cliente.store');
    }
@endphp

<h3>Formulário de Cliente</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($cliente->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($cliente->id)) {{ $cliente->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($cliente->nome)) {{ $cliente->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
        value="@if (!empty($cliente->cpf)) {{ $cliente->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br>

    <label for="">Classe de RPG</label><br>
    <select name="classe_rpg" class="form-select">
        <option value="guerreiro" {{ (!empty($cliente->classe_rpg) && $cliente->classe_rpg == 'guerreiro') ? 'selected' : '' }}>Guerreiro</option>
        <option value="mago" {{ (!empty($cliente->classe_rpg) && $cliente->classe_rpg == 'mago') ? 'selected' : '' }}>Mago</option>
        <option value="ladino" {{ (!empty($cliente->classe_rpg) && $cliente->classe_rpg == 'ladino') ? 'selected' : '' }}>Ladino</option>
        <!-- Adicione outras opções conforme necessário -->
    </select><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('cliente') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
