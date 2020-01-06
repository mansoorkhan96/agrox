<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['user', 'categories'])->get()->toArray();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parent')->get()->toArray();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'categories' => ['required'],
            'price' => ['required', 'integer'],
            'description' => ['required'],
            'featured_image' => ['required', 'image', 'max:1990'],
            'featured' => ['nullable'],
            'quantity' => ['required', 'integer'],
            'images.*' => ['image', 'max:1990']
        ], [
            'images.*.image' => 'Product Image must a type of: JPEG, PNG, JPG',
            'images.*.max' => 'Product Image size can not be greater than 2MB'
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . strtolower(Str::random(10));

        $data['featured_image'] = $request->file('featured_image')->store('/product_images');

        $images = [];

        foreach($request->file('images') as $image) {
            $images[] = $image->store('product_images');
        }

        $data['user_id'] = 1;
        $data['images'] = implode(',', $images);

        $categories = $data['categories'];
        unset($data['categories']);

        if($product = Product::create($data)) {
            $product->categories()->attach($categories);
            return 'Created';
        }

        return 'Failed';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
