<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['description','section_id'];
    
    public function answers(){
        return $this->hasMany(\App\Answers::class);
    }
    public function section(){
        return $this->belongsTo(\App\Section::class);
    }
}
