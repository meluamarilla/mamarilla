<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\respuestum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class respuestaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $respuesta = respuestum::paginate(15);

        return view('respuesta.index', compact('respuesta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('respuesta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $respuesta = new respuestum;
        $respuesta->id_preguntas = $request->id_preguntas;
        $respuesta->descripcion = $request->descripcion;
        
        $respuesta->save();

        return redirect('respuesta');
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
        $respuestum = respuestum::findOrFail($id);

        return view('respuesta.show', compact('respuestum'));
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
        $respuestum = respuestum::findOrFail($id);

        return view('respuesta.edit', compact('respuestum'));
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
        
        $respuestum = respuestum::findOrFail($id);
        $respuestum-> descripcion = $request->descripcion;
        $respuestum-> id_preguntas = $request->id_preguntas;

        $respuestum->save();


        return redirect('respuesta');
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
        respuestum::destroy($id);

        Session::flash('flash_message', 'respuestum deleted!');

        return redirect('respuesta');
    }

}
