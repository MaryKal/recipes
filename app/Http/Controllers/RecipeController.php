<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\Category;
use App\Resipe;
use App\Comment;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        
        // dd($categories);

        return view('recipes.all-recipes', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        $recipe = new Recipe();
        $recipes = Recipe::all('id','name')->pluck('name','id');
        dd($recipes); 
        return view('user.add', compact('recipe','resipes'));
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
            'category' => 'required',
            'img' =>'image|mimes:jpeg,png,jpg,gif,svg:max:2048',

        ]);
        $recipe = new Recipe();
        //в модели все столбцы таблицы записываются в свойства
        
        $recipe->name = $request->title;
        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category;

        
        $recipe->save();

        return redirect('recipes.all-resipes')->with('success', 'Your recipe added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);

        return view('recipes.single-recipe', compact('recipe'));
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
