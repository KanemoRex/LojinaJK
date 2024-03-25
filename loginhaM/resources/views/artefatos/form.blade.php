@extends('base')
@section('titulo', 'Formulário de Artefatos')
@section('conteudo')

@php
    $route = isset($dado->id) ? route('artefatos.update', $dado->id) : route('artefatos.store');
@endphp

<h3>Formulário de Artefatos</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (isset($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id" value="{{ $dado->id ?? '' }}"><br>

    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" class="form-control"
        value="{{ $dado->nome ?? old('nome') }}"><br>

    <label for="raridade">Raridade:</label><br>
    <input type="text" name="raridade" class="form-control"
        value="{{ $dado->raridade ?? old('raridade') }}"><br>

    <label for="sintonizacao">Sintonização:</label><br>
    <input type="text" name="sintonizacao" class="form-control"
        value="{{ $dado->sintonizacao ?? old('sintonizacao') }}"><br>

    <label for="Tipo_id">Tipo:</label><br>
    <select name="Tipo_id" class="form-select">
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{ isset($dado) && $dado->Tipo_id == $tipo->id ? 'selected' : '' }}>
                {{ $tipo->nome }}
            </option>
        @endforeach
    </select><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('artefatos.index') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
