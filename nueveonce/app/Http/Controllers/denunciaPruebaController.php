<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\denuncium;

class denunciaPruebaController extends Controller
{
     public function index() {
        try {

            $response = [
                'denuncias' => []
            ];
            $statusCode = 200;
            $denuncia = \App\denuncium::all();

            foreach ($denuncia as $item) {

                $response['denuncias'][] = [
                    'id_denuncia' => $item->id_denuncia,
                    'id_cuentas' => $item->id_cuentas,
                    'id_tipo' => $item->id_tipo,
                    'fecha' => $item->fecha,
                    'veracidad' => $item->veracidad                    
                ];
            }
        } catch (Exception $e) {
            $statusCode = 404;
        } finally {
            return \Response::json(array($response, $statusCode));
        }
    }
    
    public function store(Request $request) {
           //POST REQUEST
            try{
               
            $statusCode = 200;
            $denuncia = \App\denuncium::all();
            
            $denuncia = new denuncium;
            $denuncia->id_cuentas = $request->id_cuentas;
            $denuncia->id_tipo = $request->id_tipo;
            $denuncia->fecha = $request->fecha;
            $denuncia->veracidad = $request->veracidad;
            $denuncia->save();

            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('denuncias' => $denuncia->toArray(), $statusCode));
              
           }
        
    }
    
    public function show($id_denuncia) {
        try{
            $statusCode = 200;
            $denuncia = \App\denuncium::all();
            
            $denuncia = denuncium::find($id_denuncias)
                    ->where('id_denuncia', $id_denuncia)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
           return \Response::json(array('denuncias' => $denuncia->toArray(), $statusCode));
        }
    }
    
    public function update(Request $request, $id_denuncia) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $denuncia = denuncium::find($id_denuncia);//devuelve la denuncia con el id pedido
        
        //captura todos los inputs enviados
        $id_cuentas = $request->input('id_cuentas');
        $id_tipo = $request->input('id_tipo');
        $fecha = $request->input('fecha');
        $veracidad = $request->input('veracidad');
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            if ($id_cuentas) {
                $denuncia->id_cuentas = $id_cuentas;
                $bandera = true;
            }

            if ($id_tipo) {
                $denuncia->id_tipo = $id_tipo;
                $bandera = true;
            }

            if ($fecha) {
                $denuncia->fecha= $fecha;
                $bandera = true;
            }

            if ($veracidad) {
                $denuncia->veracidad= $veracidad;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $denuncia->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Denuncia actualizada'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $denuncia->id_cuentas = $request->id_cuentas;
        $denuncia->id_tipo = $request->id_tipo;
        $denuncia->fecha = $request->fecha;
        $denuncia->veracidad = $request->veracidad;
        $denuncia->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('denuncias' => $denuncia->toArray(), $statusCode));
           
        }
      
    }
    
    public function destroy($id_denuncia) {
        $denuncia = denuncium::find($id_denuncia);

        $denuncia->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Denuncia eliminada'), 200
        );
    }

}
