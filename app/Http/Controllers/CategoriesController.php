<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\AdminRoleCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(AdminRoleCheck::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->get()->toArray();
        
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        
        return view('categories.create', compact('categories'));
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
            'parent_id' => ['present', 'nullable', 'integer'],
            'name' => ['required']
        ]);

        $data['slug'] = Str::slug($data['name'], '-') . '-' . strtolower(Str::random(10));

        if(Category::create($data)) {
            return back()->with('success', 'Category added successfully');
        }
        
        return back()->with('error', 'Failed! Could not add Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::pluck('name', 'id');

        return view('categories.edit', compact(['categories','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'parent_id' => ['present', 'nullable', 'integer'],
            'name' => ['required']
        ]);

        $data['slug'] = Str::slug($data['name'], '-') . '-' . strtolower(Str::random(10));

        if(Category::where('id', $category->id)->update($data)) {
            return back()->with('success', 'Category updated successfully');
        }

        return back()->with('error', 'Failed! Could not update Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()) {
            back()->with('success', 'Category deleted succussfully');
        }

        back()->with('error', 'Failed! Could not delete Category');
    }
}
