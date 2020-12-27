<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','image','slug',];

    public function articlecount(){
       return $this->hasMany('App\Models\Articles','categori_id','id')->count();
       			//articli cedvelinin   //id si ile // olduqumuz cedvelin id si
    }
}
