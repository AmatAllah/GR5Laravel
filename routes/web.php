<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::get('/admin', function () {
    return view('index');
});


// Route::get('Message/{id?}/{name?}',function($id = null,$name = null){

//      echo 'Welcome To Laravel '.$id.'    | '.$name;
// });


// Route::get('Message/{id?}/{name}',function($id = null,$name){

//     echo 'Welcome To Laravel '.$id;
// });//->where('id','[0-9]+');  // ->where('id','[A-Za-z]+');



// Route::get('Register',function (){

//     return view('register');
// });



// Route::view('Register', 'register');

// Route::any('doRegister',function(){

//     echo 'Form Action';
// });




#Call Controller Methods  ... 
Route::get('Students','userController@display');
Route::get('Register','userController@register');
Route::post('doRegister','userController@store');
// Route::get('Profile','userController@UserData');
Route::get('edit/{id}','userController@edit');
Route::put('update/{id}','userController@update');
//Route::get('destroy/{id}','userController@destroy');
Route::delete('destroy','userController@destroy');



//Route::view('Login','login');
Route::get('Login','studentController@login');
Route::post('doLogin','studentController@dologin');
Route::get('LogOut','studentController@logout');



Route::resource('Student',"studentController");
//->middleware(['checkAuth']);



/*
Student    [GET]     =     Route::get('Student','studentController@index');
Student/create [GET] =     Route::get('Student/create','studentController@create');
Student    [POST]    =     Route::post('Student','studentController@store');
Student/{id}/edit [GET] =  Route::get('Student/{id}/edit','studentController@edit');
Student/{id}   [PUT]    =  Route::put('Student/{id}','studentController@update');
Student/{id}   [DELETE] =  Route::  delete('Student/{id}','studentController@destroy');
*/



// Route::resource('Test',"web\testtController");





// /register.php


/*
get 
post 
put 
patch 
delete 
option 
match 
any 
*/ 