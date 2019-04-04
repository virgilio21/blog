<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class QuestionController extends Controller
{
    //


    public function create($pollid,Request $data){

        Question::create([

            'description'=>$data->input('description'),
            'section_id'=>$data->input('sectionid')

        ]);

        return redirect()->route('createView',['pollid'=>$pollid]);
    }
}
