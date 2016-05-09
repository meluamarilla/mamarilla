<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDenunciasTable extends Migration
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
            Schema::create('denuncias', function(Blueprint $table) {
                $table->increments('id_denuncia');
                $table->integer('id_cuentas')->unsigned()->required();
                $table->integer('id_tipo')->unsigned()->required();
                $table->datetime('fecha')->required();
                $table->enum('veracidad',['v','f'])->default('v');//delimiata las respuestas en V (Verdadero) o F (Falso)
                $table->foreign('id_cuentas')->references('id_cuenta')->on('cuentas');
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
        Schema::drop('denuncias');
    }

}
