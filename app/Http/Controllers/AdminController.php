<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\AdminRoleCheck;
use App\Order;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(AdminRoleCheck::class);
    }

    public function index() {
        $ordersCount = Order::whereDate('created_at', Carbon::today())->count();
        $salesSum = Order::where('status', 'Complete')->whereDate('created_at', Carbon::today())->sum('billing_subtotal');
        $newCustomersCount = User::whereDate('created_at', Carbon::today())->count();

        $latestOrders = Order::latest()->take(10)->get();

        $popularCategories = Category::withCount('products')->latest('products_count')->take(10)->get();

        $latestPosts = Post::where('post_type', 'post')->latest()->withCount('discussions')->take(6)->get();

        $newCustomers = User::whereDate('created_at', Carbon::today())->get();

        $forums = Post::latest()->where('post_type', 'discussion')->withCount('discussions')->with('user')->get();

        return view('admin.index', compact([
            'ordersCount',
            'salesSum',
            'newCustomersCount',
            'latestOrders',
            'popularCategories',
            'latestPosts',
            'newCustomers',
            'forums'
        ]));
    }
}
