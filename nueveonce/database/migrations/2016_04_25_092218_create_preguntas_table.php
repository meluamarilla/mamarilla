<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreguntasTable extends Migration
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
            Schema::create('preguntas', function(Blueprint $table) {
                $table->increments('id_preguntas');
                $table->integer('id_tipo')->unsigned()->required();
                $table->string('descripcion')->required()->unique();
                $table->foreign('id_tipo')->references('id_tipo_denuncia')->on('tipodenuncias');
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
        Schema::drop('preguntas');
    }

}
