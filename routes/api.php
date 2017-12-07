<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
    return app()->version();
});

Route::post('/people', 'PeopleController@create');

Route::get('/people/{person}', 'PeopleController@retrieve');

Route::delete('/people/{person}', 'PeopleController@delete');

Route::get('/people','PeopleController@getall');

Route::put('/people/{person}','PeopleController@update');



