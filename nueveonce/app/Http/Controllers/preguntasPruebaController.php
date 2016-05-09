<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\pregunta;

class preguntasPruebaController extends Controller
{
    public function index() {
        try {

            $response = [
                'preguntas' => []
            ];
            $statusCode = 200;
            $preguntas = \App\pregunta::all();

            foreach ($preguntas as $item) {

                $response['preguntas'][] = [
                    'id_preguntas' => $item->id_preguntas,
                    'id_tipo' => $item->id_tipo,
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
            $preguntas = \App\pregunta::all();
            
            $preguntas = new pregunta;
            $preguntas->id_tipo  = $request->id_tipo ;
            $preguntas->descripcion = $request->descripcion;
            $preguntas->save();

            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('preguntas' => $preguntas->toArray(), $statusCode));
              
           }
        
    }
    
    
    public function show($id_preguntas) {
        try{
            $statusCode = 200;
            $preguntas = \App\pregunta::all();
            
            $preguntas = pregunta::find($id_preguntas)
                    ->where('id_preguntas', $id_preguntas)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
           return \Response::json(array('preguntas' => $preguntas->toArray(), $statusCode));
        }
    }
    
    public function update(Request $request, $id_preguntas) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $preguntas = pregunta::find($id_preguntas);//devuelve la pregunta con el id pedido
        
        //captura todos los inputs enviados
        $id_tipo = $request->input('id_tipo');
        $descripcion = $request->input('descripcion');
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            if ($id_tipo) {
                $preguntas->id_tipo = $id_tipo;
                $bandera = true;
            }

            if ($descripcion) {
                $preguntas->descripcion = $descripcion;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $preguntas->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Pregunta actualizada'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $preguntas->id_tipo = $request->id_tipo;
        $preguntas->descripcion = $request->descripcion;
        $preguntas->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('preguntas' => $preguntas->toArray(), $statusCode));
           
        }
      
    }
    
    public function destroy($id_preguntas) {
        $preguntas = pregunta::find($id_preguntas);

        $preguntas->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Pregunta eliminada'), 200
        );
    }

}
