<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeituraDeboraVitoria;
use App\Models\Sensor;
use App\Models\Mac;

class LeituraDeboraVitoriaController extends Controller
{
    function index()
    {
        $leituradeboravitoria = LeituraDeboraVitoria::All();
        // dd($leituradeboravitoria);

        return view('LeituraDeboraVitoriaList')->with(['leituradeboravitoria' => $leituradeboravitoria]);
    }

    function create()
    {
        $sensor = Sensor::orderBy('nome')->get();
        return view('LeituraDeboraVitoriaForm')->with(['sensor' => $sensor]);

        $mac = Mac::orderBy('nome')->get();
        return view('LeituraDeboraVitoriaForm')->with(['mac' => $mac]);
    }


    function store(Request $request)
    {
        $request->validate(
            [
                'data_leitura' => 'required | max: 120',
                'hora_leitura' => 'required | max: 120',
                'valor_sensor' => 'required',
                'sensor_id' => ' nullable',
                'mac_id' => ' nullable',
            ],
            [
                'data_leitura.required' => 'Data leitura é obrigatório',
                'data_leitura.max' => 'Só é permitido 120 caracteres',
                'hora_leitura.required' => 'Hora leitura é obrigatório',
                'hora_leitura.max' => 'Só é permitido 120 caracteres',
                'valor_sensor.required' => 'Valor sensor é obrigatório',
            ]
        );

        //dd( $request->nome);
        LeituraDeboraVitoria::create([
            'data_leitura' => $request->data_leitura,
            'hora_leitura' => $request->hora_leitura,
            'valor_sensor' => $request->valor_sensor,
            'sensor_id' => $request->sensor_id,
            'mac_id' => $request->mac_id,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\LeituraDeboraVitoriaController@index'
        );
    }

    function edit($id)
    {
        //select * from leituradeboravitoria where id = $id;
        $leituradeboravitoria = LeituraDeboraVitoria::findOrFail($id);
        //dd($leituradeboravitoria);
        $sensor = Sensor::orderBy('nome')->get();
        $mac = Mac::orderBy('nome')->get();

        return view('LeituraDeboraVitoriaForm')->with([
            'leituradeboravitoria' => $leituradeboravitoria,
            'sensor' => $sensor,
            'mac' => $mac,
        ]);
    }

    function show($id)
    {
        //select * from leituradeboravitoria where id = $id;
        $leituradeboravitoria = LeituraDeboraVitoria::findOrFail($id);
        //dd($leituradeboravitoria);
        $sensor = Sensor::orderBy('nome')->get();
        $mac = Mac::orderBy('nome')->get();

        return view('LeituraDeboraVitoriaForm')->with([
            'leituradeboravitoria' => $leituradeboravitoria,
            'sensor' => $sensor,
            'mac' => $mac,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'data_leitura' => 'required | max: 120',
                'hora_leitura' => 'required | max: 120',
                'valor_sensor' => 'required',
                'sensor_id' => ' nullable',
                'mac_id' => ' nullable',
            ],
            [
                'data_leitura.required' => 'Data leitura é obrigatório',
                'data_leitura.max' => 'Só é permitido 120 caracteres',
                'hora_leitura.required' => 'Hora leitura é obrigatório',
                'hora_leitura.max' => 'Só é permitido 120 caracteres',
                'valor_sensor.required' => 'Valor sensor é obrigatório',
            ]
        );

        LeituraDeboraVitoria::updateOrCreate(
            ['id' => $request->id],
            [
                'data_leitura' => $request->data_leitura,
                'hora_leitura' => $request->hora_leitura,
                'valor_sensor' => $request->valor_sensor,
                'sensor_id' => $request->sensor_id,
                'mac_id' => $request->mac_id,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\LeituraDeboraVitoriaController@index'
        );
    }
    //

    function destroy($id)
    {
        $leituradeboravitoria = LeituraDeboraVitoria::findOrFail($id);

        $leituradeboravitoria->delete();

        return \redirect()->action(
            'App\Http\Controllers\LeituraDeboraVitoriaController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $leituradeboravitoria = LeituraDeboraVitoria::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $leituradeboravitoria = LeituraDeboraVitoria::all();
        }

        //dd($leituradeboravitoria);
        return view('LeituraDeboraVitoriaList')->with(['leituradeboravitoria' => $leituradeboravitoria]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build
