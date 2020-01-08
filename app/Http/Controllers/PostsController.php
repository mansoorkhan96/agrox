<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['user', 'categories'])->latest()->get()->toArray();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parent')->get()->toArray();

        return view('posts.create', compact('categories'));
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
            'title' => ['required'],
            'categories' => ['required'],
            'post_type' => ['required', 'alpha'],
            'tag' => ['required', 'alpha_dash'],
            'excertp' => ['required'],
            'body' => ['required'],
            'featured_image' => ['required', 'image', 'max:1990'],
            'attachments.*' => ['image', 'max:1990']
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
