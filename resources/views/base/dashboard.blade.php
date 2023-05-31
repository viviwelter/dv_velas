@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Princípal')
    <div class="container text-center">

        <style>
            .col {
            border: 1px solid gray;
            padding: 8px;
            }

            .col {
            text-align: center;
            text-transform: uppercase;
            color: tan;
            font-size: 20px;
            font-family: Aboreto;
            }
            h6{
                text-align: center;
                color: black;
            }

            nav li a:link, nav li a:visited{
                text-decoration: none; /* retira sublinhado*/
    font-weight: bold; /* negrito*/
    color: black;
}
        </style>
        <br><br>
        <div class="row">
            <style>
                button a:link, button a:visited{
                    text-decoration: none; /* retira sublinhado*/
                    color: peru;
                    font-weight: bold;
                }
                button a:hover{
                    color: white;
                }
            </style>
            <div class="col">
                Cliente
                <h6>Para acessar a listagem de clientes:</h6>
                <button type="button" class="btn btn-outline-secondary"><a href="{{ url('/cliente') }}">Clique aqui!</a></button>
            </div>
            <div class="col">
                Estoque
                <h6>Para acessar a listagem de estoque:</h6>
                <button type="button" class="btn btn-outline-secondary"><a href="{{ url('/estoque') }}">Clique aqui!</a></button>
            </div>
            <div class="col">
                Fornecedor
                <h6>Para acessar a listagem de fornecedores:</h6>
                <button type="button" class="btn btn-outline-secondary"><a href="{{ url('/fornecedor') }}">Clique aqui!</a></button>
            </div>
            <div class="col">
                Tabela leitura
            </div>
        </div>
    </div>
@endsection
