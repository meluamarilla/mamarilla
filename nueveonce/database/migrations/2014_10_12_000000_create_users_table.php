<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //solo podrá haber un solo usuario con un nombre de usuario y email
        //required(): campos requeridos 
        //nullable(): campos que pueden estar vacíos
        //enum(): campos que están limitados por x respuestas
        //unique(): campos en los que los valores no pueden repetirse
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->required();
            $table->string('email')->unique();
            $table->string('password')->required();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
