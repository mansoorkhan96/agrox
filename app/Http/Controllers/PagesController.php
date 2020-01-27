<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = Post::where('post_type', 'post')->withCount('discussions')->withCount('likes')->latest()->take(3)->get();

        $products = Product::where('featured', true)->inRandomOrder()->latest()->take(8)->get()->toArray();

        return view('pages.home', compact(['products', 'posts']));
    }

    /**
     * Display a custom message.
     *
     * @return \Illuminate\Http\Response
     */
    public function message()
    {
        return view('pages.message');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function other()
    {
        return view('pages.other');
    }

}
