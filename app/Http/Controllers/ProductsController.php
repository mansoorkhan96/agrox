<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        //$products = Product::with(['user', 'categories'])->latest()->get()->toArray();

        return view('products.index');
    }

    public function products() {
        $products = Product::with(['user', 'categories'])->latest()->get()->toArray();

        return view('products.products', compact('products'));
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
            'details' => ['required'],
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

        $data['featured_image'] = request('featured_image')->store('product_images', 'public');

        $images = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $images[] = $image->store('product_images', 'public');
            }
        }
        
        $data['user_id'] = 1;
        $data['images'] = implode(',', $images);

        $categories = $data['categories'];
        unset($data['categories']);

        if($product = Product::create($data)) {
            $product->categories()->attach($categories);
            
            return redirect('/admin/products')->with('success', 'Product added successfully');
        }

        return redirect('/admin/products')->with('error', 'Could not add product');
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
    public function edit(Product $product)
    {
        $categories = Category::with('parent')->get()->toArray();

        $product_categories = Product::with('categories')->where('id', $product->id)->get()->toArray();
        $product_categories =  Arr::pluck($product_categories[0]['categories'], 'id');

        return view('products/edit', compact(['product', 'categories', 'product_categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required'],
            'categories' => ['required'],
            'price' => ['required', 'integer'],
            'details' => ['required'],
            'description' => ['required'],
            'featured_image' => ['image', 'max:1990'],
            'featured' => ['nullable'],
            'quantity' => ['required', 'integer'],
            'images.*' => ['image', 'max:1990']
        ], [
            'images.*.image' => 'Product Image must a type of: JPEG, PNG, JPG',
            'images.*.max' => 'Product Image size can not be greater than 2MB'
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . strtolower(Str::random(10));

        if($request->hasFile('featured_image')) {
            $data['featured_image'] = request('featured_image')->store('product_images', 'public');
        }

        $images = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $images[] = $image->store('product_images', 'public');
            }

            $data['images'] = implode(',', $images);
        }
        
        $data['user_id'] = 1;
        
        $categories = $data['categories'];
        unset($data['categories']);

        if(Product::where('id', $product->id)->update($data)) {
            $product->categories()->sync($categories);
            
            return redirect('/admin/products')->with('success', 'Product updated successfully');
        }

        return redirect('/admin/products')->with('error', 'Could not update product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()) {
            $products = Product::with(['user', 'categories'])->latest()->get()->toArray();

            return view('products.products', compact('products'));
            // return redirect('/admin/products')->with('success', 'Product deleted successfully');
        }

        // return redirect('/admin/products')->with('Could not delete product');
        return response()->json('status', false);
    }

    public function trashed() {
        $products = Product::onlyTrashed()->with(['user', 'categories'])->get()->toArray();

        return view('products.trashed', compact('products'));
    }

    public function restore($id) {
        if($product = Product::onlyTrashed()->where('id', $id)) {
            $product->restore();

            return back()->with('success', 'Product restored successfully');
        }

        abort(419);
    }
}
