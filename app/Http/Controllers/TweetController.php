<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function index()
    {
        $tweets = Tweet::latest()->get();
        return view('tweets.index',[
            'tweets'=> auth()->user()->timeline()
        ]);
    }

    public function store(){

        request()->validate([
           'body'=>'required',
        ]);

        Tweet::create([
           'user_id'=> auth()->id(),
           'body' => request('body')
        ]);
        return redirect('tweets');
    }
}
