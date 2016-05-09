<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //la tabla CUENTAS solo podrá ser cargado por medio de la aplicación 
        //en la web sólo podrá ser consultada
        //required(): campos requeridos 
        //nullable(): campos que pueden estar vacíos
        //enum(): campos que están limitados por x respuestas
        //unique(): campos en los que los valores no pueden repetirses
            Schema::create('cuentas', function(Blueprint $table) {
                $table->increments('id_cuenta');
                $table->string('nombre')->required();
                $table->string('apellido')->required();
                $table->integer('ci')->unique()->required();//solamente se podrá ingresar un número de ci, no puede haber más de dos
                $table->string('domicilio')->nullable();
                $table->integer('telefono')->nullable();
                $table->integer('dispositivo_id')->required();//esta información se obtendrá del dispositivo
                $table->enum('estado',['a','i'])->default('a');//delimita las respuestas a A (Activo) o I (Inactivo) 
                $table->timestamps();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuentas');
    }

}
