<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\funcionario;

class funcionarioPruebaController extends Controller
{
    public function index()
    {
        //GET REQUEST
        try{

            $response = [
                'funcionarios' => []
            ];
            $statusCode = 200;
            $funcionario = \App\funcionario::all();

            foreach($funcionario as $item){

                $response['funcionarios'][] = [
                    'id_funcionario' => $item->id_funcionario,
                    'nombre' => $item->nombre,
                    'apellido' => $item->apellido,
                    'ci' => $item->ci,
                    'rango' => $item->rango,
                    'direccion' => $item->direccion,
                    'telefono' => $item->telefono
                        
                ];
            }
        }catch (Exception $e){
            $statusCode = 404;
        }finally{
            return \Response::json(array($response, $statusCode));
        }
        
    }  	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
           //POST REQUEST
            try{
               
            $statusCode = 200;
            $funcionario = \App\funcionario::all();
            
            $funcionario = new funcionario;
            $funcionario->nombre = $request->nombre;
            $funcionario->apellido = $request->apellido;
            $funcionario->ci = $request->ci;
            $funcionario->rango = $request->rango;
            $funcionario->direccion = $request->direccion;
            $funcionario->telefono = $request->telefono;
            
            $funcionario->save();
            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('funcionarios' => $funcionario->toArray(), $statusCode));
               
               /*return \Response::json(array(
                        'error' => false,
                        'funcionarios' => $funcionario->toArray())), 200
                   ;*/
           }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id_funcionario) {
        try{
            $statusCode = 200;
            $funcionario = \App\funcionario::all();
            
            $funcionario = funcionario::find($id_funcionario)
                    ->where('id_funcionario', $id_funcionario)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
            return \Response::json(array('funcionarios' => $funcionario->toArray(), $statusCode));
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id_funcionario) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $funcionario = funcionario::find($id_funcionario);//devuelve el funcionario con el id pedido
        
        //captura todos los inputs enviados
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $ci = $request->input('ci');
        $rango = $request->input('rango');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            if ($nombre) {
                $funcionario->nombre = $nombre;
                $bandera = true;
            }

            if ($apellido) {
                $funcionario->apellido = $apellido;
                $bandera = true;
            }

            if ($ci) {
                $funcionario->ci = $ci;
                $bandera = true;
            }

            if ($rango) {
                $funcionario->rango = $rango;
                $bandera = true;
            }

            if ($direccion) {
                $funcionario->direccion = $direccion;
                $bandera = true;
            }

            if ($telefono) {
                $funcionario->telefono = $telefono;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $funcionario->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Funcionario actualizado'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $funcionario->nombre = $request->nombre;
        $funcionario->apellido = $request->apellido;
        $funcionario->ci = $request->ci;
        $funcionario->rango = $request->rango;
        $funcionario->direccion = $request->direccion;
        $funcionario->telefono = $request->telefono;
        $funcionario->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('funcionarios' => $funcionario->toArray(), $statusCode));
           
        }
      
    }
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id_funcionario) {
        $funcionario = funcionario::find($id_funcionario);

        $funcionario->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Funcionario eliminado'), 200
        );
    }

}

//

