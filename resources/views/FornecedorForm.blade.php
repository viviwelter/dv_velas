@extends('base.app')
@section('conteudo')
    @php
        if (!empty($fornecedor->id)) {
            $route = route('fornecedor.update', $fornecedor->id);
        } else {
            $route = route('fornecedor.store');
        }
    @endphp
@section('tituloPagina', 'Formulário de Forncedores')
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
    }
    </style>
    <h1>Novo fornecedor</h1>
</div>
<body>
<div class="container mt-3">
    <style> label{font-family: Aboreto;}</style>
    <form action="FornecedorForm.php" method= "POST">
    <input type="hidden" name="id"value="<?php echo !empty($data->id) ? $data->id: ""?>"/><br>
    <label>Empresa</label><br>
    <input type="text" name="empresa" class="form-control" value="<?php echo !empty($data->empresa) ? $data->empresa: ""?>"/><br>
    <label>Telefone</label><br>
    <input type="text" name="telefone"  class="form-control" value="<?php echo !empty($data->telefone) ? $data->telefone: ""?>"/><br>
    <label>Mercadoria</label><br>
    <input type="text" name="mercadoria"  class="form-control" value="<?php echo !empty($data->mercadoria) ? $data->mercadoria: ""?>"/>
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group-mr-2" role="group" aria-label="First group">
        <button type="submit" class="btn btn-outline-success">Salvar</button>
        <button type="button" class="btn btn-outline-info"><a href="FornecedorList.php">Listar</a></button>
        <button type="button" class="btn btn-outline-danger"><a href="../index.php">Menu</a></button>
        </div>
    </div>
    </form>
</div>
</body>
@endsection

