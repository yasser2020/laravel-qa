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
        return route('questions.show',$this->slug);
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }


     //this is accessor for set sitablue class to status
    public function getStatusAttribute()
    {
        if($this->answers_count>0)
        {
               if($this->best_anwser_id){
                   return "answered-accepted";
               }
               return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id=$answer->id;
        $this->save();
    }
    
    
   
}

