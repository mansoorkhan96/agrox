<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesPostCount = DB::table('categories')
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select(DB::raw(('categories.id, categories.name, COUNT(category_post.post_id) AS posts_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        $popular = Post::inRandomOrder()->latest()->take(5)->get()->toArray();

        $posts = Post::paginate(6);

        return view('blog.index', compact(['categoriesPostCount', 'popular', 'posts']));
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
        $post = Post::with('user')->where('slug', $slug)->firstOrFail();

        $categoriesPostCount = DB::table('categories')
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select(DB::raw(('categories.id, categories.name, COUNT(category_post.post_id) AS posts_count')))
            ->groupBy('categories.id')
            ->get()->toArray();
        $popular = Post::inRandomOrder()->latest()->take(5)->get()->toArray();

        return view('blog.show', compact('post'));
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
