<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function create(){

        $validatedTweet = request()->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $validatedTweet['body']
        ]);
        
        return redirect('/home');
    }

    public function list() {
        return view('home' , [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
