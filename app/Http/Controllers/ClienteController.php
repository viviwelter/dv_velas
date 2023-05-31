<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    function index()
    {
        $clientes = Cliente::All();
        // dd($clientes);

        return view('ClienteList')->with(['clientes' => $clientes]);
    }

    function create()
    {
        return view('ClienteForm');
    }

    function store(Request $request)
    {
      //  dd($request);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'email' => ' nullable | email | max: 100',
                'cpf' => 'required | max: 20',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'cpf.required' => 'O cpf é obrigatório',
                'cpf.max' => 'Só é permitido 20 caracteres',
                'email.max' => 'Só é permitido 100 caracteres',
            ]
        );

        //dd( $request->nome);
        Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\ClienteController@index'
        );
    }

    function edit($id)
    {

        $cliente = Cliente::findOrFail($id);
        //dd($cliente);

        return view('ClienteForm')->with([
            'cliente' => $cliente,
        ]);
    }

    function show($id)
    {
        //select * from cliente where id = $id;
        $cliente = Cliente::findOrFail($id);
        //dd($cliente);

        return view('ClienteForm')->with([
            'cliente' => $cliente,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'email' => ' nullable | email | max: 100',
                'cpf' => 'required | max: 20',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'cpf.required' => 'O cpf é obrigatório',
                'cpf.max' => 'Só é permitido 20 caracteres',
                'email.max' => 'Só é permitido 100 caracteres',
            ]
        );

        Cliente::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'email' => $request->email,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\ClienteController@index'
        );
    }
    //

    function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return \redirect()->action(
            'App\Http\Controllers\ClienteController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $clientes = Cliente::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $clientes = Cliente::all();
        }

        //dd($clientes);
        return view('ClienteList')->with(['clientes' => $clientes]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

