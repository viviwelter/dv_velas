@extends('base.app')
@section('conteudo')
    @php
        if (!empty($cliente->id)) {
            $route = route('cliente.update', $cliente->id);
        } else {
            $route = route('cliente.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Cliente')

<div class="valores">
    <style>
        .valores {
            border: 1px solid gray;
            padding: 8px;
        }
        h1 {
            text-align: center;
            text-transform: uppercase;
            color: tan;
            font-size: 50px;
            font-family: Aboreto;
        }
    </style>
    <h1>Cadastro de novos clientes</h1>
</div>
<div class="container mt-3">
    <style>
        .button {
            border: 1px solid gray;
            padding: 8px;
            font-family: Aboreto;
        }
        button a:link, button a:visited{
            text-decoration: none; /* retira sublinhado*/
            color: rgb(0, 195, 255);
        }
        button a:hover{
            color: white;
        }
    </style>
    <style> label{font-family: Aboreto;}</style>
    <form action="{{$route}}" method= "POST">
        @csrf
        @if (!empty($cliente->id))
            @method('PUT')
        @endif
        <input type="hidden" name="id"
        value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($cliente->id)) {{ $cliente->id }} @else {{ '' }} @endif" /><br>
        <label class="form-label">Nome</label><br>
        <input type="text" class="form-control" name="nome"value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($cliente->nome)) {{ $cliente->nome }} @else {{ '' }} @endif" /><br>
        <label>Email</label><br>
        <input type="text" class="form-control" name="email" value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($cliente->email)) {{ $cliente->email }} @else {{ '' }} @endif" /><br>
        <label>CPF</label><br>
        <input type="text" class="form-control" name="cpf" value="@if (!empty(old('cpf'))) {{ old('cpf') }} @elseif(!empty($cliente->cpf)) {{ $cliente->cpf }} @else {{ '' }} @endif" /><br>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-mr-2" role="group" aria-label="First group">
            <button type="submit" class="btn btn-outline-success">Salvar</button>
            <button type="button" class="btn btn-outline-info"><a href="{{ url('dashboard') }}">Voltar</a></button>
            </div>
        </div>
    </form>
</div>
@endsection
