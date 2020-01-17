<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $posts = Post::where('post_type', 'post')->withCount('discussions')->latest()->take(3)->get();

        $products = Product::where('featured', true)->inRandomOrder()->latest()->take(6)->get()->toArray();

        // return view('pages.home', compact(['products', 'posts']));

        return response()->json([
            'posts' => $posts,
            'products' => $products
        ]);
    }
}
