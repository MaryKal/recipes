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
        // $users = Recipe::find()->users;
        // $rec= RecipeUser::find(1)->user_id;
        // $users = User::all()->find($id);
        // // $us = $users->id;
        // $userRecipes = RecipeUser::where('user_id',$users)->first()->recipe_id;
        // $rec = RecipeUser::find($userRecipes)->recipe;
      

        // $us = RecipeUser::find($users->id);
        // $rec = $recipes->id;
        // $user = auth()->user();
        // $us = $user->id;
        // // $recipes = RecipeUser::find($user->id);
        // $rec = RecipeUser::where('user_id',$us)->first()->recipe_id;
        // $recipes = RecipeUser::find($rec)->recipe;

     
        // dd($rec);

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

        // dd($categories);

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
        $request->validate([
            'name' => 'required|max:100|min:3',
            'describe' => 'required|min:3',
            'category_id' => 'required',
            'user_id' => '',
            'slug' => '',

            // 'img' =>'image|mimes:jpeg,png,jpg,gif,svg:max:2048',

        ]);

        // $user = auth()->user()->id;
        $recipe = new Recipe;
        $recipe->name = $request->name;

        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = 'admin';
        $recipe->slug = $request->slug;
        // dd($request->all());


        $recipe->save();
        return redirect('admin/recipes/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $recipe = Recipe::find($id);
        $recipe = Recipe::where('id', $id)->first();
        // dd($recipe);

        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
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

    public function newesResipes()
    {
        $newest = Recipe::orderBy('created_at','desc')->take(4)->get();

        return view(('home.index'), compact('newest'));
    }
}
