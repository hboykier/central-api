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

use Illuminate\Support\Facades\Config;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'admin/role/'], function ($app) {
    $app->get('/','Admin\RoleController@index'); //get all the routes
    $app->post('/','Admin\RoleController@store'); //store single route
    $app->get('/{id}/', 'Admin\RoleController@show'); //get single route
    $app->put('/{id}/','Admin\RoleController@update'); //update single route
    $app->delete('/{id}/','Admin\RoleController@destroy'); //delete single route
});