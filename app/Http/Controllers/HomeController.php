<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    
        // $this->middleware('auth');
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
       $recipes = $this->newestRecipes();
       $categories = $this->popularCategories();
 
        return view('home.index', compact('recipes','categories'));

    }
    public function newestRecipes()
    {
        $newestRecipes = Recipe::orderBy('id', 'desc')->take(4)->get();

        return $newestRecipes;

    }
    public function popularCategories()
    {
        $popularCategories = Category::orderBy('id', 'desc')->take(9)->get();//добавить те, в которых больше всего рецептов

        return $popularCategories;

    }
    
}
