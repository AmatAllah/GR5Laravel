<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;


 protected $table = "departments";

 protected $fillable = ['title'];


   public function students(){

    return $this->hasMany('App\Models\student','dep_id','id');
   }



}
