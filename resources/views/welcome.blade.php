@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Página Inicial')
<div>
    <style>
        .imgmenu {
            width: 50%;
            margin-left: 25%;
            margin-right: 15%;
        }
    </style>
    <img class="imgmenu" src="/storage/img/vela1.avif">
</div>
<br>
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

        .missao {
            text-indent: 50px;
            text-align: justify;
            letter-spacing: 3px;
            margin-left: 2%;
            margin-right: 2%;
        }
    </style>
    <h1>Missão dv velas <br></h1>
    <p class="missao"><br> Nós da DV velas prezamos por trazer aos nossos clientes, colaboradores e associados, a melhor
        experiência na aquisição de suas velas. Não apenas como itens decorativos, mas também como itens de valor para
        aqueles que se juntarem à família DV Velas.
        <br> Estimando sempre a qualidade e elegância de nossos produtos. De forma consciente visando o cuidado com o
        meio ambiente. <br>
    </p>
</div>
</div>
<br>

@endsection
