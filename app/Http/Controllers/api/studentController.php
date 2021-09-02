<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\student;
use Validator;

class studentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      $data = student::get();

      return response()->json(['data' => $data],200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $validate = Validator::make($request->all(),[
           "name"     => "required",
           "email"    => "required|email",
           "password" => "required|min:6|max:10",
           "dep_id"   => "required|numeric",
           "image"    => "required|image|mimes:png,jpeg,jpg,gif",

        ]);


         if($validate->fails()){
             return response()->json(['errors' => $validate->errors()]);
         }else{


            
     # upload image ... 

     $finalName = time().rand().'.'.$request->image->extension();

     $request->image->move(public_path('images'),$finalName);


        $op =   student::create(['name' => $request->name,'email' => $request->email,'password' => bcrypt($request->password),'dep_id' => $request->dep_id,'image' => $finalName]);

        if($op){
            $message = "Data Saved";
        }else{
            $message = "Error Try Again";
        }


        return response()->json(['Message' => $message]);

         }


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

//
$validate = Validator::make($request->all(),[
    "name"     => "required",
    "email"    => "required|email",
    "dep_id"   => "required|numeric",

 ]);


  if($validate->fails()){
      return response()->json(['errors' => $validate->errors()]);
  }else{



 $op =   student::where('id',$id)->update(['name' => $request->name,'email' => $request->email,'dep_id' => $request->dep_id]);

 if($op){
     $message = "Data Updated";
 }else{
     $message = "Error Try Again";
 }


 return response()->json(['Message' => $message]);

      }
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

        return response()->json(['Message' => $message]);



    }
}
