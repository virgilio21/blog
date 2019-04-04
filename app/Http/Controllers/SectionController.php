<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Section;
class SectionController extends Controller
{
    //

    public function create($pollid,Request $data){
        Section::create([
            'name'=>$data->input('sectionName'),
            'poll_id'=>$pollid
        ]);
        return redirect()->route('createView',['id'=>$pollid]);
    }
}
