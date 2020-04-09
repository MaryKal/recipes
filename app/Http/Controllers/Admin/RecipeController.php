<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\RecipeUser;
use App\Comment;
use App\Http\Controllers\Controller;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $recipes = Recipe::all();

        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe = new Recipe();
        $recipes = Category::all('id','name')->pluck('name','id');

        // dd($recipes);

        return view('admin.recipes.create', compact('recipe','recipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:100|min:3',
            'describe' => 'required|min:3',
            'category_id' => 'required',
            'user_id' => '',
            'slug' => '',
            'img' =>'image|mimes:jpeg,png,jpg,gif,svg',

        ]);
        // dd($request->all());

        // $user = auth()->user()->id;
        $recipe = new Recipe;
        $recipe->name = $request->name;

        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = '12';
        $recipe->slug = $request->slug;
        $recipe->image = $request->image;
        // dd($request->all());


        $recipe->save();
        return redirect('/admin/recipes/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        // $recipe = Recipe::where('id', $id)->first();
        $recipe = Recipe::find($id);
        // dd($recipe);
        // $user = Users::where()
        // dd($recipe);

        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:100|min:3',
            'describe' => 'required|min:3',
            'category_id' => 'required',            
            'slug' => '',
            'img' =>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $recipe = Recipe::find($id);
        // dd($id);

        $recipe->name = $request->name;

        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        // $recipe->user_id = '12';
        $recipe->slug = $request->slug;
        $recipe->image = $request->image;
        // $category = Category::find($id)->update($request->all());

            // dd($request->all());
        $recipe->update();

        // dd($category->img);
            // $category->update();
        return redirect('admin\recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }

   
}
