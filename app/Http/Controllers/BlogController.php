<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 1;
        $categoriesPostCount = DB::table('categories')
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_post.post_id) AS posts_count')))
            ->groupBy('categories.id')
            ->get()->toArray();

        $popular = Post::inRandomOrder()->where('post_type', 'post')->latest()->take(5)->get()->toArray();

        if(request()->tag) {
            $posts = Post::where('tag', request()->tag)->where('post_type', 'post')->withCount('discussions')->paginate($pagination);

            $title = Str::title(request()->tag);
            $title = 'Tag: ' . str_replace('_', ' ', $title);

        } else if(request()->category) {

            $posts = Post::whereHas('categories', function($query) {
                $query->where('slug', request()->category);
            })->where('post_type', 'post')->withCount('discussions')->paginate($pagination);

            $title = Str::title(request()->tag);
            $title = 'Category: ' . Str::title(str_replace('-', ' ', request()->category));
            
        } else {
            $posts = Post::where('post_type', 'post')->withCount('discussions')->paginate($pagination);
            $title = 'Latest Posts';
        }

        return view('blog.index', compact(['categoriesPostCount', 'popular', 'posts', 'title']));
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

        $comments = Discussion::with('user')->where('post_id', $post->id)->get();

        $ratings = $post->ratings()->count();

        $ratingsSum = $post->ratings()->sum('rating');

        $postRating = '';
        if($ratings > 0) {
            $postRating = ($ratingsSum / $ratings);
        }

        $userRating = null;
        if(Auth::check()) {
            $userRating = $post->userRating()->first() ? $post->userRating()->first()->rating : '';
        }

        $post_categories = $post->categories()->where('category_post.post_id', $post->id)->get();

        $categoriesPostCount = DB::table('categories')
            ->join('category_post', 'categories.id', '=', 'category_post.category_id')
            ->select(DB::raw(('categories.id, categories.name, categories.slug, COUNT(category_post.post_id) AS posts_count')))
            ->groupBy('categories.id')
            ->get()->toArray();

        $popular = Post::inRandomOrder()->where('post_type', 'post')->latest()->take(5)->get()->toArray();

        return view('blog.show', compact(['post', 'categoriesPostCount', 'popular', 'post_categories', 'userRating', 'postRating', 'comments']));
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

    public function createComment(Request $request, Post $post) {
        $request->validate([
            'comment' => 'required'
        ]);
        
        Discussion::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'discussion' => $request->comment
        ]);

        return response()->json(['success' => 'Your comment was saved!']);
    }
}
