<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\FarmerRoleCheck;
use App\Order;
use App\OrderProduct;
use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FarmerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(FarmerRoleCheck::class);
    }

    public function index() {

        // $orders = Order::whereHas('product', function($query) {
        //     $query->where('seller_id', auth()->user()->id);
        // })->with('product')->get()->toArray();

        $orders = Order::whereHas('product', function($query) {
            $query->where('seller_id', auth()->user()->id);
        })->whereDate('created_at', Carbon::today())->with('products')->get();

        $salesSum = 0;
        foreach($orders as $order) {
            foreach($order->products as $product) {
                $salesSum += $product->price * $product->pivot->quantity;
            }
        }


        $ordersCount = Order::whereDate('created_at', Carbon::today())->whereHas('product', function($query) {
            $query->where('seller_id', auth()->user()->id);
        })->with('product')->count();

        $newCustomersCount = User::whereDate('created_at', Carbon::today())->count();

        $latestOrders = Order::whereHas('product', function($query) {
            $query->where('seller_id', auth()->user()->id);
        })->latest()->take(10)->with('product')->get();

        $popularCategories = Category::withCount('products')->latest('products_count')->take(10)->get();

        $latestPosts = Post::where('post_type', 'post')->latest()->withCount('discussions')->withCount('likes')->take(6)->get();

        $newCustomers = User::whereDate('created_at', Carbon::today())->get();

        return view('farmer.index', compact([
            'ordersCount',
            'salesSum',
            'newCustomersCount',
            'latestOrders',
            'popularCategories',
            'latestPosts',
            'newCustomers',
        ]));
    }
    
}
