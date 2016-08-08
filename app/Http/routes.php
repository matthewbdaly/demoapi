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

$app->get('/api/products', 'ProductController@index');
$app->post('/api/products', 'ProductController@store');
$app->get('/api/products/{id}', 'ProductController@show');
