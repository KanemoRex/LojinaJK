@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Artefatos')
@php
    if (!empty($dado->id)) {
        $route = route('artefatos.update', $dado->id);
    } else {
        $route = route('artefatos.store');
    }
@endphp

<h3>Formulário de Artefatos</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Tipagem</label><br>
    <input type="text" name="tipagem" class="form-control"
        value="@if (!empty($dado->tipagem)) {{ $dado->tipagem }}@elseif (!empty(old('tipagem'))){{ old('tipagem') }}@else{{ '' }} @endif"><br>

    <label for="">Modificador</label><br>
    <input type="text" name="modificador" class="form-control"
        value="@if (!empty($dado->modificador)) {{ $dado->modificador }}@elseif (!empty(old('modificador'))){{ old('modificador') }}@else{{ '' }} @endif"><br>

    <label for="">Característica</label><br>
    <input type="text" name="caracteristica" class="form-control"
        value="@if (!empty($dado->caracteristica)) {{ $dado->caracteristica }}@elseif (!empty(old('caracteristica'))){{ old('caracteristica') }}@else{{ '' }} @endif"><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('artefatos') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
