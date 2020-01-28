<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductReview;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 6;

        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        
        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        if(request()->category) {
            $products = Product::whereHas('categories', function($query) {
                $query->where('slug', request()->category);
            })->with('reviews')->latest()->paginate($pagination);

            $title = 'Category: ' . Category::where('slug', request()->category)->first()->name;
        } else if(request()->search_query) {
            $products = Product::search(request()->search_query)->with('reviews')->latest()->paginate($pagination);

            $title = 'Searched For: ' . request()->search_query;
        } else {
            $products = Product::with('reviews')->latest()->paginate($pagination);
            $title = 'Popular Products';
        }

        return view('shop.home', compact(['categoriesProductCount', 'mightAlsoLike', 'products', 'title']));
    }

    public function shopList() {
        $products = Product::paginate(6);

        return view('shop.shop-list', compact('products'));
    }

    public function shopGrid() {
        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        
        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        $products = Product::paginate(6);

        return view('shop.shop-grid', compact(['categoriesProductCount', 'mightAlsoLike', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $userCanReview = false;

        if(Auth::check()) {
            $userOrderProduct = DB::table('order_product')
                ->join('orders', 'order_product.order_id', '=', 'orders.id')
                ->where('orders.user_id', auth()->user()->id)
                ->where('order_product.product_id', $product->id)
                ->get();
            
            $userCanReview = $userOrderProduct->isNotEmpty();
        }

        $ratings = $product->reviews()->count();

        $ratingsSum = $product->reviews()->sum('rating');

        $productRating = '';
        if($ratings > 0) {
            $productRating = round(($ratingsSum / $ratings), 1);
        }

        $userRating = null;
        if(Auth::check()) {
            $userRating = $product->userReview()->first() ? $product->userReview()->first()->rating : '';
        }

        $reviews = ProductReview::with('user')->where('product_id', $product->id)->get();

        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();

        $product_categories = Product::with('categories')->where('id', $product->id)->get()->toArray();
        $product_categories =  Arr::pluck($product_categories[0]['categories'], 'id');

        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        $related_products = DB::table('products')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->whereIn('category_product.category_id', $product_categories)
            ->where('category_product.product_id', '!=', $product->id)
            ->get()->toArray();


        return view('shop.show', compact([
            'product',
            'categoriesProductCount',
            'mightAlsoLike',
            'related_products',
            'reviews',
            'userRating',
            'productRating',
            'userCanReview'
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeRating(Request $request, Product $product) {
        ProductReview::updateOrCreate(
            ['user_id' => auth()->user()->id, 'product_id' => $product->id],
            ['user_id' => auth()->user()->id, 'product_id' => $product->id, 'rating' => $request->rating],
        );

        $ratings = $product->reviews()->count();

        $ratingsSum = $product->reviews()->sum('rating');

        $productRating = round(($ratingsSum / $ratings), 1);

        return response()->json(['success' => 'Product Rated Successfully!', 'productRating' => $productRating]);
    }

    public function createReview(Request $request, Product $product) {
        $request->validate([
            'comment' => 'required'
        ]);
        
        ProductReview::updateOrCreate(
            ['user_id' => auth()->user()->id, 'product_id' => $product->id],
            ['user_id' => auth()->user()->id, 'product_id' => $product->id, 'review' => $request->comment],
        );

        $reviews = ProductReview::with('user')->where('product_id', $product->id)->get();

        return response()->json(['success' => 'Your review was saved!', 'reviews' => $reviews]);
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        if(! Auth::check()) {
            return redirect('login');
        }

        $orders = auth()->user()->orders()->with('products')->get();

        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        
        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        return view('shop.orders', compact(['orders', 'categoriesProductCount', 'mightAlsoLike']));
    }

    /**
     * Display the specified order details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOrder(Order $order)
    {
        if(auth()->user()->id !== $order->user_id) {
            abort(401, 'Unauthorized request');
        }

        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        
        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        $products = $order->products;

        return view('shop.show-order', compact(['order', 'categoriesProductCount', 'mightAlsoLike', 'products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, Order $order)
    {
        $status = 'Pending';
        $msg = 'Order was activated!';

        if($request->status == 'Cancelled') {
            $status = 'Cancelled';
            $msg = 'Order was cancelled!';
        }

        $order->status = $status;
        $order->save();

        return response()->json(['success' => $msg]);
    }
}
