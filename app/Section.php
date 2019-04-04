<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = ['name','poll_id'];

    public function poll(){ 
        return $this->belongsTo(\App\Poll::class);
    }

    public function questions(){
        return $this->hasMany(\App\Question::class);
    }

}
