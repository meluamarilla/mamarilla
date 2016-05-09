<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRespuestasTable extends Migration
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
            Schema::create('respuestas', function(Blueprint $table) {
                $table->increments('id_respuesta');
                $table->integer('id_preguntas')->unsigned()->required();
                $table->string('descripcion')->required();
                $table->foreign('id_preguntas')->references('id_preguntas')->on('preguntas');
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
        Schema::drop('respuestas');
    }

}
