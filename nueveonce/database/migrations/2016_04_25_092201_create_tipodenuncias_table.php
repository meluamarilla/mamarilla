<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipodenunciasTable extends Migration
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
            Schema::create('tipodenuncias', function(Blueprint $table) {
                $table->increments('id_tipo_denuncia');
                $table->string('descripcion')->required()->unique();//1.Accidente,2.Robo,3.Violencia Familiar,4.Misceláneo
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
        Schema::drop('tipodenuncias');
    }

}
