<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    function index()
    {
        $sensor = Sensor::All();
        // dd($sensor);

        return view('SensorList')->with(['sensor' => $sensor]);
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
        Sensor::create([
            'nome' => $request->nome,
            'contador' => $request->contador,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\SensorController@index'
        );
    }

    function edit($id)
    {

        $sensor = Sensor::findOrFail($id);
        //dd($sensor);

        return view('SensorForm')->with([
            'sensor' => $sensor,
        ]);
    }

    function show($id)
    {
        //select * from sensor where id = $id;
        $sensor = Sensor::findOrFail($id);
        //dd($sensor);

        return view('SensorForm')->with([
            'sensor' => $sensor,
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

        Sensor::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'contador' => $request->contador,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\SensorController@index'
        );
    }
    //

    function destroy($id)
    {
        $sensor = Sensor::findOrFail($id);

        $sensor->delete();

        return \redirect()->action(
            'App\Http\Controllers\SensorController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $sensor = Sensor::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $sensor = Sensor::all();
        }

        //dd($sensor);
        return view('SensorList')->with(['sensor' => $sensor]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

