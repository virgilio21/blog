<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Poll;
class PollController extends Controller
{
    //

    public function create(Request $data){
        Poll::create(
            [
                'name'=>$data->input('name'),
                'visibility'=>true
            ]
        );
        return redirect('/home');
    }   

    public function createView($pollId){
        $pollRequest = Poll::find($pollId);        
        return view('poll.create', ['poll'=>$pollRequest]);
    }

    public function updateVisibility($pollId){
        $pollRequest = Poll::find($pollId);
        $pollRequest->visibility = !$pollRequest->visibility;
        $pollRequest->save();
        return redirect('/home');
    }

}
