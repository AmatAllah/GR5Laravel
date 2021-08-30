<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class userController extends Controller
{
    //



  public function display(){

    $data = student::get();

    return view('userIndex',['data' => $data]);
  }





  public function register(){

    return view('register');
  }




  public function store(Request $request){
     
     
      // dd(request());    == $request
    
   $data =   $this->validate(request(),[

        "name"      => "required",
        "email"     => "required|email",
        "password"  => "required|min:6|max:10",

     ]);

        $data['password']   =  bcrypt($request->password);// $data['password'] 

     // logic  
      $op = student::create($data);

       if($op){
 
        return back();

       }


  }







# get method 
  // public function destroy($id){

  //   // code ..... 
  //    student::where('id',$id)->delete();

  //    return back();
  // }

# delete Method
  public function destroy(Request $request){

    // code ..... 
    student::where('id',$request->id)->delete();
   
    return back();
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