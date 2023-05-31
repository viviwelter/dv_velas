@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Listagem de Estoque')
<body>
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
        <h1>Estoque</h1>
    </div>
    <div class="container">
        <form action="EstoqueList.php" method="post">
            <select name="campo">
                <option value="essencia">Essencia</option>
                <option value="cera">Cera</option>
                <option value="pavio">Pavio</option>
            </select>
        <div class="row g-3">
            <div class="col-3">
                <input type="text" class="form-control" class="form-control"  placeholder="Pesquisar" name="valor"/>
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-outline-secondary" value="Buscar"/>
            </div>
        </div>
    </div>

    <div class="cadastra">
        <style>
            .cadastra {
                margin: 0;
            }
            .button {
                border: 1px solid gray;
                padding: 8px;
                font-family: Aboreto;
                display: block;
                margin: 0 auto;
                font-size: 18px;
            }
            button a:link, button a:visited{
                text-decoration: none; /* retira sublinhado*/
                font-weight: bold; /* negrito*/
                color: black;
            }
            button a:hover{
                color: tan;
            }
        </style>
    </div>

    <div class="cadastra">
        <br><br>
        <button class="button button1"><a href="{{ url('/estoque/create') }}">Cadastrar um novo item do estoque</a></button>
        <br><br>
        <div class="tabela">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Essencia</th>
                        <th>Cera</th>
                        <th>Pavio</th>
                    </tr>
                </thead>

                @foreach($estoque as $item)
                @php
                $nome_imagem = !empty($usuario->imagem) ? $usuario->imagem : 'sem_imagem.jpg';
            @endphp

                <tr>
                    <td scope='row'>{{ $item->id}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->essencia}}</td>
                    <td>{{$item->cera}}</td>
                    <td>{{$item->pavio}}</td>
                    <td><img src="/storage/{{ $nome_imagem }}" width="100px" class="img-thumbnail" /> </td>
                    <td><a href="{{ action('App\Http\Controllers\EstoqueController@edit', $item->id) }}"><i
                        class='fa-solid fa-pencil' style='color:blue;'></i></a></td>
                    <td>
                    <form method="POST"
                        action="{{ action('App\Http\Controllers\EstoqueController@destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset;'><i
                                class='fa-solid fa-trash-can' style='color: #6d1818;'></i>
                        </button>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
@endsection

