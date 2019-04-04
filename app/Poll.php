<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    //
    protected $fillable = ['name','visibility'];


    public function sections(){
        return $this->hasMany(\App\Section::class);
    }
}
