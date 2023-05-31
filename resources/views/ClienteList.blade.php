@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Listagem de Cliente')
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

            
            <h1>Clientes</h1>
        </div>
        <div class="container">
            <form action="ClienteList.php" method="post">
                <select name="campo">
                    <option value="nome">Nome</option>
                    <option value="email">Email</option>
                    <option value="cpf">CPF</option>
                </select>
                <div class="row g-3">
                    <div class="col-3">
                        <input type="text" class="form-control" class="form-control"  placeholder="Pesquisar" name="valor"/>
                    </div>
                    <div class="col-3">
                        <input type="submit" class="btn btn-outline-secondary" value="Buscar"/>
                    </div>
                </div>
            </form>
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
            <button class="button button1"><a href="{{ url('/cliente/create') }}">Cadastrar um novo cliente</a></button>
            <br><br>
            <div class="tabela">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">CPF</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>


                    @foreach($clientes as $item)
                        <tr>
                            <td scope='row'>{{ $item->id}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nome}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->cpf}}</td>
                            <td><a href="{{ action('App\Http\Controllers\ClienteController@edit', $item->id) }}"><i
                                class='fa-solid fa-pencil' style='color:blue;'></i></a></td>
                            <td>
                            <form method="POST"
                                action="{{ action('App\Http\Controllers\ClienteController@destroy', $item->id) }}">
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
