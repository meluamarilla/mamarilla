<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //required(): campos requeridos 
        //nullable(): campos que pueden estar vacíos
        //enum(): campos que están limitados por x respuestas
        //unique(): campos en los que los valores no pueden repetirse
            Schema::create('funcionarios', function(Blueprint $table) {
                $table->increments('id_funcionario');
                $table->string('nombre')->required();
                $table->string('apellido')->nullable();
                $table->integer('ci')->unique()->required();
                $table->string('rango')->nullable();
                $table->string('direccion')->nullable();
                $table->integer('telefono')->nullable();
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
        Schema::drop('funcionarios');
    }

}
