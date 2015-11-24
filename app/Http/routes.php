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

Route::get('/', function () {
    return view('welcome');
});
Route::get('log', 'PlataformaController@log');
Route::post('log', 'PlataformaController@login');
Route::get('logout', 'PlataformaController@logout');
Route::group(['middleware' => 'auth'], function() {
    Route::get('admin/usuario/permisos', 'UsuarioController@permiso');
    Route::post('admin/usuario/permisos/{id}', 'UsuarioController@addpermiso');
    Route::get('admin',['as' => 'task','uses' => 'PlataformaController@index']);
    Route::post('admin', 'PlataformaController@store');
    Route::get('admin/reporte/clientes', 'PlataformaController@clienteTareas');
    Route::get('admin/reporte/clientes/{id}', 'PlataformaController@datosClienteTareas');
    Route::get('admin/reporte/usuarios', 'PlataformaController@usuarioTareas');
    Route::get('admin/reporte/usuarios/{id}', 'PlataformaController@datosUsuarioTareas');

});
Route::group(["prefix" => "admin"], function(){
    ///**********************//////////////
    Route::group(['middleware' => 'auth'], function(){
        Route::resource('usuario', 'UsuarioController');
        Route::get('usuario/delete/{id}', 'UsuarioController@destroy');
        //Route::get('usuario/permisos', 'UsuarioController@permiso');

        ///*********************///////////////

        Route::resource('cliente', 'ClienteController');
        Route::get('cliente/delete/{id}', 'ClienteController@destroy');
    ///********************////////////////
    });
});