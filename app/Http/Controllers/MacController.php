<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mac;

class MacController extends Controller
{
    function index()
    {
        $mac = Mac::All();
        // dd($mac);

        return view('MacList')->with(['mac' => $mac]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 100',
                'contador' => ' nullable | contador | max: 100',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 100 caracteres',
                'contador.max' => 'Só é permitido 100 caracteres',
            ]
        );

        //dd( $request->nome);
        Mac::create([
            'nome' => $request->nome,
            'contador' => $request->contador,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\MacController@index'
        );
    }

    function edit($id)
    {

        $mac = Mac::findOrFail($id);
        //dd($mac);

        return view('MacForm')->with([
            'mac' => $mac,
        ]);
    }

    function show($id)
    {
        //select * from mac where id = $id;
        $mac = Mac::findOrFail($id);
        //dd($mac);

        return view('MacForm')->with([
            'mac' => $mac,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 100',
                'contador' => ' nullable | contador | max: 100',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 100 caracteres',
                'contador.max' => 'Só é permitido 100 caracteres',
            ]
        );

        Mac::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'contador' => $request->contador,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\MacController@index'
        );
    }
    //

    function destroy($id)
    {
        $mac = Mac::findOrFail($id);

        $mac->delete();

        return \redirect()->action(
            'App\Http\Controllers\MacController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $mac = Mac::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $mac = Mac::all();
        }

        //dd($mac);
        return view('MacList')->with(['mac' => $mac]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

