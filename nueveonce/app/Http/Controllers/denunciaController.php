<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\denuncium;
use App\tipoDenuncium;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class denunciaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $denuncia = denuncium::paginate(15);
        
        return view('denuncia.index', compact('denuncia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('denuncia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $denuncia = new denuncium;
        $denuncia->id_cuenta = $request->id_cuenta;
        $denuncia->id_tipo = $request->id_tipo;
        $denuncia->fecha = $request->fecha;
        $denuncia->veracidad = $request->veracidad;
        
        $denuncia->save();

        return redirect('denuncia');
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
        $denuncium = denuncium::findOrFail($id);

        return view('denuncia.show', compact('denuncium'));
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
        $denuncium = denuncium::findOrFail($id);

        return view('denuncia.edit', compact('denuncium'));
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
        
        $denuncium = denuncium::findOrFail($id);
        $denuncium-> veracidad = $request->veracidad;
        
        $denuncium->save();

        Session::flash('flash_message', 'denuncium updated!');

        return redirect('denuncia');
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
        denuncium::destroy($id);

        Session::flash('flash_message', 'denuncium deleted!');

        return redirect('denuncia');
    }

}
