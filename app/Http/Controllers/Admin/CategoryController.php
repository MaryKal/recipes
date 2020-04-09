<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        // dd($categories);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        // $categories = Category::all('id','name')->pluck('name','id');

        // dd($categories);

        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'slug' => '',
        ]);

        $category = new Category();
        // dd($request->all);

        $category->img = $request->image;
        $category->name = $request->name;
        $category->slug = $request->slug;
            dd($request->all);
        // Category::create($request->all());
        // Category::create($request->all());
            // dd($request->all());

        $category->save();

        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // $categories = Category::all('id','name')->pluck('name','id');
        // dd($category);

        // dd($category);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       

        // dd($id);

        $request->validate([
            'name' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'slug' => '',
        ]);

        // $category = Category::find($id)->update($request->all());
        // $category->$request->all();
        $category = Category::find($id);
        $category->img = $request->image;
        $category->name = $request->name;
        $category->slug = $request->slug;
        // // dd($request->all());
        $category->update();
        // $category = Category::find($id)->update($request->all());

            // dd($request->all());
        // dd($category->img);
            // $category->update();
        return redirect('admin\categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    
}
