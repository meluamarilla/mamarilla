<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tipoDenuncium;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class tipoDenunciaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tipodenuncia = tipoDenuncium::paginate(15);

        return view('tipodenuncia.index', compact('tipodenuncia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipodenuncia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $tipodenuncia = new tipoDenuncium;
        $tipodenuncia->descripcion = $request->descripcion;
        
        $tipodenuncia->save();

        return redirect('tipodenuncia');
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
        $tipodenuncium = tipoDenuncium::findOrFail($id);

        return view('tipodenuncia.show', compact('tipodenuncium'));
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
        $tipodenuncium = tipoDenuncium::findOrFail($id);

        return view('tipodenuncia.edit', compact('tipodenuncium'));
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
        
        $tipodenuncia= tipoDenuncium::findOrFail($id);
        $tipodenuncia->descripcion = $request->descripcion;
        $tipodenuncia->save();
        
        return redirect('tipodenuncia');
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
        tipoDenuncium::destroy($id);

        Session::flash('flash_message', 'tipoDenuncium deleted!');

        return redirect('tipodenuncia');
    }

}
