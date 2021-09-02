<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class student  extends Authenticatable  implements JWTSubject
{
    use HasFactory;


   protected  $table = "students";

   protected $fillable = ['name','email','password','image','dep_id'];




   public function dep_data(){

     return  $this->belongsTo('App\Models\departments','dep_id','id');
   }




    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }




}
// php artisan make:model name 