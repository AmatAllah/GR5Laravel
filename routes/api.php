<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





//Route::get('Index','\api\studentController@index');


Route::apiResource('Student','api\studentController');

/*
Student    [GET]     =     Route::get('Student','studentController@index');
Student/create [GET] =     Route::get('Student/create','studentController@create');
Student    [POST]    =     Route::post('Student','studentController@store');
Student/{id}/edit [GET] =  Route::get('Student/{id}/edit','studentController@edit');
Student/{id}   [PUT]    =  Route::put('Student/{id}','studentController@update');
Student/{id}   [DELETE] =  Route::  delete('Student/{id}','studentController@destroy');
*/





Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'api\AuthController@login');
    Route::post('logout', 'api\AuthController@logout');
    Route::post('refresh', 'api\AuthController@refresh');
    Route::post('me', 'api\AuthController@me');

});