<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/prueba','PruebaController@index');

$router->group(['prefix'=>'clientes'], function($router){
    $router->get('','ClienteController@index');
    $router->get('/all','ClienteController@index');
    $router->get('/get/{cedula}','ClienteController@getCliente');
    $router->post('','ClienteController@createCliente');
    
});

$router->group(['prefix'=>'usuarios'], function($router){
    $router->post('/ingresar','UserController@login');
    $router->post('/deposito','TransaccionController@realizartransaccion');
    
});
