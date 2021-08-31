<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class studentController extends Controller
{


     public function __construct(){

        $this->middleware('checkAuth',['except' => ['create','store','login','doLogin']]);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      $data = student::paginate(5);

      return view('student.index',['data' => $data]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $data = $this->validate($request,[
           "name" => "required",
           "email" => "required|email",
           "password" => "required|min:6",
           "image"    => "required|image|mimes:png,jpeg,jpg,gif"
       ]);



     # upload image ... 

     $finalName = time().rand().'.'.$request->image->extension();

//     $request->image->move(public_path('images'),$finalName);
//     $request->image->storeAs('images',$finalName);


       $data['password'] = bcrypt($data['password']);
       
       $op = student::create($data);

       if($op){
           $message = "Student Registered";
       }else{
           $message = "Error Try Again";
       }

       session()->flash('Message',$message);

     //  return redirect(url('/Student/create'));

       return back();

         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

      $data = student::where('id',$id)->get();

      return view('student.edit',['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        $data = $this->validate($request,[
       
            "name"  => "required",
            "email" => "required|email"
      
           ]);
      
      
           $op = student::where('id',$id)->update(["name" => $request->name , "email" => $request->email]);
      
      
            if($op){
                $message = "Record Updated";
            }else{
                $message = "Error Try Again";
            }


            session()->flash('Message',$message);

            return redirect(url('/Student'));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      
        $op = student::where('id',$id)->delete();

        if($op){
            $message =  "student Deleted";

        }
        else{
            $message = "Error Try Again";
        }

         session()->flash('Message',$message);

        return redirect(url('/Student'));



    }




   public function login(){
       return view('login');
   } 


   public function doLogin(Request $request){

    // logic .... 

    $data = $this->validate($request,[
        
        "email" => "required|email",
        "password" => "required|min:6"
    ]);

    $status = false;
    if($request->has('rememberMe')){
     $status = true;
    }

   
      if(auth()->attempt($data,$status)){


        return redirect(url('/Student'));

      }else{

        session()->flash('Message','Invalid Credentials try again');
        return redirect(url('/Login'));

      }

    

   }



   public function logout(){

    auth()->logout();

    return redirect(url('/Login'));
   }




}








