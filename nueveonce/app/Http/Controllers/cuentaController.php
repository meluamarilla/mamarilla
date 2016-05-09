<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\cuentum;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class cuentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cuenta = cuentum::ci($request->get('ci'))->orderBy('id_cuenta', 'DESC')->paginate(15);//permite mostrar la cuenta que contenga el nro de ci requerido, lo pagina de 15 en 15 y muestra lso datos de manera descendente

        return view('cuenta.index', compact('cuenta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuenta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $cuenta = new cuentum;
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->ci = $request->ci;
        $cuenta->domicilio = $request->domicilio;
        $cuenta->telefono = $request->telefono;
        $cuenta->dispositivo_id = $request->dispositivo_id;
        $cuenta->estado = $request->estado;
        
        $cuenta->save();

        return redirect('cuenta');
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
        $cuentum = cuentum::findOrFail($id);

        return view('cuenta.show', compact('cuentum'));
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
        $cuentum = cuentum::findOrFail($id);

        return view('cuenta.edit', compact('cuentum'));
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
        
        $cuentum = cuentum::findOrFail($id);
        $cuentum->update($request->all());

        Session::flash('flash_message', 'cuentum updated!');

        return redirect('cuenta');
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
        cuentum::destroy($id);

        Session::flash('flash_message', 'cuentum deleted!');

        return redirect('cuenta');
    }

}
