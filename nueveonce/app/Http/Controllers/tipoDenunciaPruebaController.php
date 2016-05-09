<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\tipoDenuncium;

class tipoDenunciaPruebaController extends Controller
{
     public function index() {
        try {

            $response = [
                'tipodenuncias' => []
            ];
            $statusCode = 200;
            $tipodenuncia = \App\tipoDenuncium::all();

            foreach ($tipodenuncia as $item) {

                $response['tipodenuncias'][] = [
                    'id_tipo_denuncia' => $item->id_tipo_denuncia,
                    'descripcion' => $item->descripcion,
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
            $tipodenuncia = \App\tipoDenuncium::all();
            
            $tipodenuncia = new tipoDenuncium;
            $tipodenuncia->descripcion = $request->descripcion;
            $tipodenuncia->save();
            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('tipodenuncias' => $tipodenuncia->toArray(), $statusCode));
              
           }
        
    }
    
    
    public function show($id_tipo) {
        try{
            $statusCode = 200;
            $tipodenuncia = \App\tipoDenuncium::all();
            
            $tipodenuncia = tipoDenuncium::find($id_tipo)
                    ->where('id_tipo_denuncia', $id_tipo)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
           return \Response::json(array('tipodenuncias' => $tipodenuncia->toArray(), $statusCode));
        }
    }
    
    public function update(Request $request, $id_tipo) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $tipodenuncia = tipoDenuncium::find($id_tipo);//devuelve la respuesta con el id pedido
        
        //captura todos los inputs enviados
        $descripcion = $request->input('descripcion');
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            
            if ($descripcion) {
                $tipodenuncia->descripcion = $descripcion;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $tipodenuncia->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Tipo de denuncia actualizada'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $tipodenuncia->descripcion = $request->descripcion;
        $tipodenuncia->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('tipodenuncias' => $tipodenuncia->toArray(), $statusCode));
           
        }
      
    }
    
    public function destroy($id_tipo) {
        $tipodenuncia = tipoDenuncium::find($id_tipo);

        $tipodenuncia->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Respuesta eliminada'), 200
        );
    }
}
