<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = ['contenido','question_id'];

    public function question(){
        return $this->belongsTo(\App\Question::class);
    }
}
