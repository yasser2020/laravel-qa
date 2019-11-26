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
        //Accessor
    public function getUrlAttribute()
    {
        return route('questions.show',$this->id);
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if($this->anwsers>0)
        {
               if($this->best_answer_id){
                   return "answered-accepted";
               }
               return "answered";
        }
        return "unanswered";
    }
    
   
}

