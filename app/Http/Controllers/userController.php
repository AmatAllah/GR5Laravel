<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //



  public function Message(){
      return 'From Controller';
  }


  public function register(){

    return view('register');
  }



  public function saveData(Request $request){

      // dd($request->all());

     //  echo   $request->input('name');
     //  echo $request->name;

     // dd($request->has('gender'));
      // dd( $request->only(['name','email']));
      //dd( $request->except(['name']));

      // echo $request->method();

     //  dd($request->isMethod('POST'));


     //  echo  $request->url();

        // echo $request->ip();


        $data = $request->except('_token');

        foreach($data as $key => $value){

            echo '* '.$key.' : '.$value.'<br>';
        }

        
        
  
    }








    public function UserData(){

      //$names = ['ahmed','Root','x','y'];
      

       //return view('userProfile',['userNames' => $names,'title' => "User's Name"]);

      // return view('userProfile')->with(['userNames' => $names,'title' => "User's Name",'Message' => 'Welcome To Our Site']);
    
      $userNames = ['ahmed','Root','x','y'];
      $title = "User's Name";
      $Message = 'Welcome To Our Site';
        return view('userProfile',compact('userNames','title','Message'));
    }





}




// php artisan make:controller testController 