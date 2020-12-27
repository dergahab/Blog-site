<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articles extends Model
{
	 use SoftDeletes;
     //protected $fillable = ['title','content','slug','image','categori_id'];


     public function getCategory(){
     	return  $this->hasOne('App\Models\Category','id','categori_id');
      }
}
