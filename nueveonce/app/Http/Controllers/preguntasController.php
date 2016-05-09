<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\pregunta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;

class preguntasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*$preguntas = DB::table('preguntas')
                ->join('tipoDenuncias','preguntas.id_tipo','=', 'tipoDenuncias.id_tipo_denuncia')
                ->select('preguntas.descripcion', 'tipoDenuncias.descripcion')
                ->paginate(15);*/
        //dd($preguntas);
        $preguntas = pregunta::paginate(15);

        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $preguntas = new pregunta;
        $preguntas->id_tipo = $request->id_tipo;
        $preguntas->descripcion = $request->descripcion;
        
        $preguntas->save();

        return redirect('preguntas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pregunta = pregunta::findOrFail($id);

        return view('preguntas.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pregunta = pregunta::findOrFail($id);

        return view('preguntas.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $pregunta = pregunta::findOrFail($id);
        $pregunta-> id_tipo = $request->id_tipo;
        $pregunta-> descripcion = $request->descripcion;

        $pregunta->save();

        return redirect('preguntas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        pregunta::destroy($id);

        Session::flash('flash_message', 'pregunta deleted!');

        return redirect('preguntas');
    }

}
