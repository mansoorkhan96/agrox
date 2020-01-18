<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\ConsultantRoleCheck;
use App\Order;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ConsultantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(ConsultantRoleCheck::class);
    }

    public function index() {
        $popularCategories = Category::withCount('products')->latest('products_count')->take(10)->get();

        $latestPosts = Post::where('post_type', 'post')->latest()->withCount('discussions')->take(6)->get();

        return view('consultant.index', compact([
            'popularCategories',
            'latestPosts',
        ]));
    }
}
