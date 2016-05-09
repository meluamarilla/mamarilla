<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\respuestum;

class respuestaPruebaController extends Controller
{
     public function index() {
        try {

            $response = [
                'respuestas' => []
            ];
            $statusCode = 200;
            $respuesta = \App\respuestum::all();

            foreach ($respuesta as $item) {

                $response['respuestas'][] = [
                    'id_respuesta' => $item->id_respuesta,
                    'id_preguntas' => $item->id_preguntas,
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
            $respuesta = \App\respuestum::all();
            
            $respuesta = new respuestum;
            $respuesta->id_preguntas  = $request->id_preguntas;
            $respuesta->descripcion = $request->descripcion;
            $respuesta->save();

            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('respuestas' => $respuesta->toArray(), $statusCode));
              
           }
        
    }
    
    
    public function show($id_respuesta) {
        try{
            $statusCode = 200;
            $respuesta = \App\respuestum::all();
            
            $respuesta = respuestum::find($id_respuesta)
                    ->where('id_respuesta', $id_respuesta)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
           return \Response::json(array('respuestas' => $respuesta->toArray(), $statusCode));
        }
    }
    
    public function update(Request $request, $id_respuesta) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $respuesta = respuestum::find($id_respuesta);//devuelve la respuesta con el id pedido
        
        //captura todos los inputs enviados
        $id_preguntas = $request->input('id_preguntas');
        $descripcion = $request->input('descripcion');
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            if ($id_preguntas) {
                $respuesta->id_preguntas = $id_preguntas;
                $bandera = true;
            }

            if ($descripcion) {
                $respuesta->descripcion = $descripcion;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $respuesta->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Respuesta actualizada'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $respuesta->id_preguntas = $request->id_preguntas;
        $respuesta->descripcion = $request->descripcion;
        $respuesta->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('respuestas' => $respuesta->toArray(), $statusCode));
           
        }
      
    }
    
    public function destroy($id_respuesta) {
        $respuesta = respuestum::find($id_respuesta);

        $respuesta->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Respuesta eliminada'), 200
        );
    }
}
