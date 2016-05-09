<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\cuentum;

class cuentaPruebaController extends Controller
{
    public function index() {
        try {

            $response = [
                'cuentas' => []
            ];
            $statusCode = 200;
            $cuenta = \App\cuentum::all();

            foreach ($cuenta as $item) {

                $response['cuentas'][] = [
                    'id_cuenta' => $item->id_cuenta,
                    'nombre' => $item->nombre,
                    'apellido' => $item->apellido,
                    'ci' => $item->ci,
                    'domicilio' => $item->domicilio,
                    'telefono' => $item->telefono,
                    'dispositivo_id' => $item->dispositivo_id,
                    'estado' => $item->estado,
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
            $cuenta = \App\cuentum::all();
            
            $cuenta = new cuentum;
            $cuenta->nombre = $request->nombre;
            $cuenta->apellido = $request->apellido;
            $cuenta->ci = $request->ci;
            $cuenta->domicilio = $request->domicilio;
            $cuenta->telefono = $request->telefono;
            $cuenta->dispositivo_id = $request->dispositivo_id;
            $cuenta->estado = $request->estado;

            $cuenta->save();

            
           }catch (Exception $e){
               $statusCode = 404;
           }finally{
            
               return \Response::json(array('cuentas' => $cuenta->toArray(), $statusCode));
              
           }
        
    }
    
    public function show($id_cuenta) {
        try{
            $statusCode = 200;
            $cuenta = \App\cuentum::all();
            
            $cuenta = cuentum::find($id_cuenta)
                    ->where('id_cuenta', $id_cuenta)
                    ->take(1)
                    ->get();
            
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           
           return \Response::json(array('cuentas' => $cuenta->toArray(), $statusCode));
        }
    }
    
    public function update(Request $request, $id_cuenta) {
      
        //PUT OR PATCH REQUEST
      try{
      
        $method = $request->method(); //captura el método que enviamos (put o patch)
        $statusCode = 200;
        $cuenta = cuentum::find($id_cuenta);//devuelve la cuenta con el id pedido
        
        //captura todos los inputs enviados
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $ci = $request->input('ci');
        $domicilio = $request->input('direccion');
        $telefono = $request->input('telefono');
        $dispositivo_id = $request->input('dispositivo_id');
        $estado = $request->input('estado');
        
        if($request->isMethod('PATCH'))//si es un método patch significa que solo algunos campos van a ser editados (no todos)
        {
            $bandera = false;//cuando la bandera sea true, significa que ese campo va a ser editado
            if ($nombre) {
                $cuenta->nombre = $nombre;
                $bandera = true;
            }

            if ($apellido) {
                $cuenta->apellido = $apellido;
                $bandera = true;
            }

            if ($ci) {
                $cuenta->ci = $ci;
                $bandera = true;
            }

            if ($domicilio) {
                $cuenta->domicilio = $domicilio;
                $bandera = true;
            }

            if ($telefono) {
                $cuenta->telefono = $telefono;
                $bandera = true;
            }
            
            if ($dispositivo_id) {
                $cuenta->dispositivo_id = $dispositivo_id;
                $bandera = true;
            }
            
            if ($estado) {
                $cuenta->estado = $estado;
                $bandera = true;
            }

            if ($bandera) {
            // Almacenamos en la base de datos el registro.
               $cuenta->save();

                return \Response::json(array(
                'error' => false,
                 'message' => 'Cuenta actualizada'), 200
                );
           }

      }
      //si no es un método patch es post, entonces todos los campos van a ser editados y luego almacenados en la bd
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->ci = $request->ci;
        $cuenta->domicilio = $request->domicilio;
        $cuenta->telefono = $request->telefono;
        $cuenta->dispositivo_id = $request->dispositivo_id;
        $cuenta->estado = $request->estado;
        $cuenta->save();
        
        } catch (Exception $ex) {
           $statusCode = 404;
        } finally{
           return \Response::json(array('cuentas' => $cuenta->toArray(), $statusCode));
           
        }
      
    }
    
    public function destroy($id_cuenta) {
        $cuenta = cuentum::find($id_cuenta);

        $cuenta->delete();

        return \Response::json(array(
                    'error' => false,
                    'message' => 'Cuenta eliminada'), 200
        );
    }

}
