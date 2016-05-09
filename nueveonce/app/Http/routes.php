<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', [
    'as' => 'home', 'uses' => 'HomeController@index'
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');


//RUTAS CREADAS POR EL CRUD GENERATOR

Route::group(['middleware' => ['web']], function () {
	Route::resource('cuenta', 'cuentaController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('tipodenuncia', 'tipoDenunciaController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('denuncia', 'denunciaController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('preguntas', 'preguntasController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('respuesta', 'respuestaController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('funcionario', 'funcionarioController');
});

//Route::resource('funcionario', 'funcionarioController');

//Rutas para REST API
//FUNCIONARIO
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('funcionarios','funcionarioPruebaController');
}); 

//CUENTAS
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('cuentas','cuentaPruebaController');
}); 

//DENUNCIA
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('denuncias','denunciaPruebaController');
}); 

//PREGUNTAS
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('preguntas','preguntasPruebaController');
}); 

//RESPUESTA
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('respuestas','respuestaPruebaController');
}); 

//TipoDenuncia
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('tipodenuncias','tipoDenunciaPruebaController');
}); 

