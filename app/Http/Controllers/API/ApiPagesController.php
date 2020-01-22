<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use Illuminate\Http\Request;

class ApiPagesController extends Controller
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

        return response()->json(['products' => $products, 'posts' => $posts]);
    }
}
