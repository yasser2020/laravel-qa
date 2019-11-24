<?php

namespace App;
use App/User;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   
   protect $fillable=['title','body'];
    public function user(){
        return $this->belongsto(User::class);
    }


    public function setTitleAttribute($value){

    	$this->attributes['title']=$value;
    	$this->attributes['slug']=Str::slug($value);
    	

    }
   
}

