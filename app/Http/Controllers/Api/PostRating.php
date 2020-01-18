<?php

namespace App\Http\Controllers;

use App\Post;
use App\Rating;
use Illuminate\Http\Request;

class PostRating extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Store a newly created resource in storage or update the existing one.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        Rating::updateOrCreate(
            ['user_id' => auth()->user()->id, 'post_id' => $post->id],
            ['user_id' => auth()->user()->id, 'post_id' => $post->id, 'rating' => $request->rating],
        );

        $ratings = $post->ratings()->count();

        $ratingsSum = $post->ratings()->sum('rating');

        $postRating = ($ratingsSum / $ratings);

        return response()->json(['success' => 'Posted Rated Successfully!', 'postRating' => $postRating]);
    }
}
