<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class student  extends Authenticatable
{
    use HasFactory;


   protected  $table = "students";

   protected $fillable = ['name','email','password','image','dep_id'];




   public function dep_data(){

     return  $this->belongsTo('App\Models\departments','dep_id','id');
   }



}
// php artisan make:model name 