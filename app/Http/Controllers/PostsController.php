<?php

namespace App\Http\Controllers;

use App\Category;
use App\Discussion;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role_id == 5) {
            abort(401);
        }

        if(auth()->user()->role_id != 1) {
            $posts = Post::where('post_type', 'post')->where('user_id', auth()->user()->id)->with(['user', 'categories'])->latest()->get()->toArray();
        } else {
            $posts = Post::where('post_type', 'post')->with(['user', 'categories'])->latest()->get()->toArray();
        }

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
        if(request()->post_type == 'discussion') {
            $featured_image_rule = ['nullable', 'image', 'max:1990'];
        } else {
            $featured_image_rule = ['required', 'image', 'max:1990'];
        }
        $data = $request->validate([
            'title' => ['required'],
            'categories' => ['required'],
            'post_type' => ['required', 'alpha'],
            'tag' => ['nullable', 'alpha_dash'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'featured_image' => $featured_image_rule,
            'attachments.*' => [
                'nullable',
                'file',
                'max:3990',
                'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/jpeg,image/png,video/avi,video/mpeg,video/quicktime,video/3gpp,video/3gpp2,video/mp4,video/webm'
            ]
        ], [
            'attachments.*.image' => 'Attachment(s) must a type of: JPEG, PNG, JPG',
            'attachments.*.max' => 'Attachment(s) size can not be greater than 4MB',
            'attachments.*.mimetypes' => 'Attachment(s) must be of type: [Image, Word File, Excel File, PPT File, Video]',
            'attachments.*.file' => 'Attachment(s) must be a file'
        ]);

        if($data['post_type'] == 'discussion') {
            $data['tag'] = null;
        }
            
        $data['slug'] = Str::slug($data['title']) . '-' . strtolower(Str::random(10));
        if(request()->hasFile('featured_image')) {
            $data['featured_image'] = request('featured_image')->store('product_images', 'public');
        } else {
            $data['featured_image'] = null;
        }

        $attachments = [];
        if($request->hasFile('attachments')) {
            foreach($request->file('attachments') as $image) {
                $attachments[] = $image->store('post_attachments', 'public');
            }
        }
        
        $data['user_id'] = auth()->user()->id;
        $data['attachments'] = implode(',', $attachments);

        $categories = $data['categories'];
        unset($data['categories']);

        $redirect = '/dashboard/posts';
        if($data['post_type'] == 'discussion') {
            $redirect = '/forum';
        }

        if($post = Post::create($data)) {
            $post->categories()->attach($categories);
            
            return redirect($redirect)->with('success', 'Item added successfully!');
        }

        return redirect($redirect)->with('error', 'Could not add Item!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $likesCount = $post->likes()->count();
        $post_categories = $post->categories()->where('category_post.post_id', $post->id)->pluck('name');
        $comments = $post->discussions()->with('user')->get()->toArray();
        $author = $post->user()->first();

        if($post->post_type == 'discussion') {
            return view('forum.show', compact(['post', 'post_categories', 'comments', 'author']));
        }
        return view('posts.show', compact(['post', 'post_categories', 'comments', 'author', 'likesCount']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(auth()->user()->role_id != 1 && $post->user_id != auth()->user()->id) {
            abort(401);
        }

        $categories = Category::with('parent')->get()->toArray();

        $post_categories = $post->categories()->where('category_post.post_id', $post->id)->pluck('category_post.category_id')->toArray();

        // $post_categories = Post::with('categories')->where('id', $post->id)->get()->toArray();
        // $post_categories =  Arr::pluck($post_categories[0]['categories'], 'id');

        return view('posts.edit', compact(['post', 'categories', 'post_categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(auth()->user()->role_id != 1 && $post->user_id != auth()->user()->id) {
            abort(401);
        }

        if(request()->post_type == 'discussion') {
            $featured_image_rule = ['nullable', 'image', 'max:1990'];
        } else {
            $featured_image_rule = ['required', 'image', 'max:1990'];
        }

        $data = $request->validate([
            'title' => ['required'],
            'categories' => ['required'],
            'post_type' => ['required', 'alpha'],
            'tag' => ['nullable', 'alpha_dash'],
            'excerpt' => ['required'],
            'body' => ['required'],
            'featured_image' => $featured_image_rule,
            'attachments.*' => [
                'nullable',
                'file',
                'max:3990',
                'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,image/jpeg,image/png,video/avi,video/mpeg,video/quicktime,video/3gpp,video/3gpp2,video/mp4,video/webm'
            ]
        ], [
            'attachments.*.image' => 'Attachment(s) must a type of: JPEG, PNG, JPG',
            'attachments.*.max' => 'Attachment(s) size can not be greater than 4MB',
            'attachments.*.mimetypes' => 'Attachment(s) must be of type: [Image, Word File, Excel File, PPT File, Video]',
            'attachments.*.file' => 'Attachment(s) must be a file'
        ]);
            
        $data['slug'] = Str::slug($data['title']) . '-' . strtolower(Str::random(10));

        if($request->hasFile('featured_image')) {
            $data['featured_image'] = request('featured_image')->store('product_images', 'public');
        }

        if($data['post_type'] == 'discussion') {
            $data['tag'] = null;
        }

        $attachments = [];
        if($request->hasFile('attachments')) {
            foreach($request->file('attachments') as $image) {
                $attachments[] = $image->store('post_attachments', 'public');
            }
            
            $data['attachments'] = implode(',', $attachments);
        }
        
        $data['user_id'] = auth()->user()->id;

        $categories = $data['categories'];
        unset($data['categories']);

        $redirect = '/dashboard/posts';
        if($data['post_type'] == 'discussion') {
            $redirect = '/forum';
        }

        if(Post::where('id', $post->id)->update($data)) {
            $post->categories()->sync($categories);
            
            return redirect($redirect)->with('success', 'Item update successfully!');
        }

        return redirect($redirect)->with('error', 'Could not update Item!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if(auth()->user()->role_id != 1 && $post->user_id != auth()->user()->id) {
            abort(401);
        }

        if($post->delete()) {
            return back()->with('success', 'Post moved to Trash!');
        }

        return back()->with('error', 'Could not delete the post!');
    }

    public function trashed() {
        if(auth()->user()->role_id != 1) {
            $posts = Post::onlyTrashed()->where('user_id', auth()->user()->id)->with(['user', 'categories'])->get()->toArray();
        } else {
            $posts = Post::onlyTrashed()->with(['user', 'categories'])->get()->toArray();
        }

        return view('posts.trashed', compact('posts'));
    }

    public function restore($id) {
        if($post = Post::onlyTrashed()->where('id', $id)) {
            $post->restore();

            return back()->with('success', 'Post restored successfully');
        }

        abort(419);
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

        return back()->with('success', 'Your comment was saved!');
    }

    public function deleteComment($id) {
        Discussion::where('id', $id)->delete();

        return back()->with('success', 'Comment was deleted!');
    }
}
