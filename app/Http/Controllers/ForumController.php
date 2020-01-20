<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchResults = null;

        $myForums = Post::where('user_id', auth()->user()->id)->where('post_type', 'discussion')->with('categories')->latest()->get()->toArray();

        if(request()->search_query) {
            $searchResults = Post::latest()->where('post_type', 'discussion')->withCount('discussions')
                ->with('user')    
                ->search(request()->search_query)
                ->get();
        } 

        $forums = Post::latest()->where('post_type', 'discussion')->withCount('discussions')->with('user')->get();
        
        $activeTopics = Post::where('post_type', 'discussion')->whereHas('discussions', function($query) {
            $query->where('discussion', '!=', null)->whereDate('created_at', '>=', Carbon::now()->subDays(3));
        })->get();

        return view('forum.index', compact(['forums', 'myForums', 'activeTopics', 'searchResults']));
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
