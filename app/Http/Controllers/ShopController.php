<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductReview;
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
        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, COUNT(category_product.product_id) AS products_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        
        $mightAlsoLike = $products = Product::inRandomOrder()->latest()->take(5)->get()->toArray();

        $products = Product::with('reviews')->latest()->paginate(6);

        return view('shop.home', compact(['categoriesProductCount', 'mightAlsoLike', 'products']));
    }

    public function shopList() {
        $products = Product::paginate(6);

        return view('shop.shop-list', compact('products'));
    }

    public function shopGrid() {
        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, COUNT(category_product.product_id) AS products_count')))
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

        $ratings = $product->reviews()->count();

        $ratingsSum = $product->reviews()->sum('rating');

        $productRating = '';
        if($ratings > 0) {
            $productRating = ($ratingsSum / $ratings);
        }

        $userRating = null;
        if(Auth::check()) {
            $userRating = $product->userReview()->first() ? $product->userReview()->first()->rating : '';
        }

        $reviews = ProductReview::with('user')->where('product_id', $product->id)->get();

        $categoriesProductCount = DB::table('categories')
            ->join('category_product', 'categories.id', '=', 'category_product.category_id')
            ->select(DB::raw(('categories.id, categories.name, COUNT(category_product.product_id) AS products_count')))
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


        return view('shop.show', compact(['product', 'categoriesProductCount', 'mightAlsoLike', 'related_products', 'reviews', 'userRating', 'productRating']));
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

        $productRating = ($ratingsSum / $ratings);

        return response()->json(['success' => 'producted Rated Successfully!', 'productRating' => $productRating]);
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
}
