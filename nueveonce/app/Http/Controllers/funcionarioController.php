<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\funcionario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class funcionarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $funcionario = funcionario::ci($request->get('ci'))->orderBy('id_funcionario', 'DESC')->paginate(15);

        return view('funcionario.index', compact('funcionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $funcionario = new funcionario;
        $funcionario->nombre = $request->nombre;
        $funcionario->apellido = $request->apellido;
        $funcionario->ci = $request->ci;
        $funcionario->rango = $request->rango;
        $funcionario->direccion = $request->direccion;
        $funcionario->telefono = $request->telefono;
        
        $funcionario->save();
        
        /*
        funcionario::create($request->all());

        Session::flash('flash_message', 'funcionario added!');*/

        return redirect('funcionario');
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
        $funcionario = funcionario::findOrFail($id);

        return view('funcionario.show', compact('funcionario'));
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
        $funcionario = funcionario::findOrFail($id);

        return view('funcionario.edit', compact('funcionario'));
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
        $funcionario = funcionario::findOrFail($id);
        $funcionario->nombre = $request->nombre;
        $funcionario->apellido = $request->apellido;
        $funcionario->ci = $request->ci;
        $funcionario->rango = $request->rango;
        $funcionario->direccion = $request->direccion;
        $funcionario->telefono = $request->telefono;
        $funcionario->save();
        
        /*$funcionario->update($request->all());

        Session::flash('flash_message', 'funcionario updated!');*/

        return redirect('funcionario');
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
        funcionario::destroy($id);

        Session::flash('flash_message', 'funcionario deleted!');

        return redirect('funcionario');
    }

}
