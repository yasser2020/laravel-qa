<?php

namespace App;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{   
   protected $fillable=['title','body'];
    public function user(){
        return $this->belongsto(User::class);
    }

    //Mutator
    public function setTitleAttribute($value){

    	$this->attributes['title']=$value;
    	$this->attributes['slug']=Str::slug($value);   
    }
    
   
}

