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

Route::get('Profile','userController@UserData');

//Route::get('destroy/{id}','userController@destroy');
Route::delete('destroy','userController@destroy');








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