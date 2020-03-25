<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Category;
use app\User;


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
        // $categoriesList = $this->categoriesList();
        // $singleCategory = $this->singleCategory($id);
        $recipes = $this->newestRecipes();
        $categories = $this->popularCategories();
       
        // $user = $this->getProfile();
        // $user = $this->userProfile($id);

        //    $singleRecipe = $this->singleRecipe();

        return view('home.index', compact('recipes', 'categories'));
    }
    public function newestRecipes()
    {
        $newestRecipes = Recipe::orderBy('id', 'desc')->take(4)->get();

        return $newestRecipes;
    }
    public function popularCategories()
    {
        $popularCategories = Category::orderBy('id', 'desc')->take(9)->get(); //добавить те, в которых больше всего рецептов

        return $popularCategories;
    }
    public function categoriesList()
    {
        $categories = Category::all();
        // dd($categories);

        return view('categories.all-categories', compact('categories'));
    }
    public function singleCategory($id)
    {
        $category = Category::find($id);
        // dd($category);
        // $rec = $category->recipe;

        $recipes = Recipe::where('category_id', $id)->get();
        // $recipe = $recipes->recipe;
        // $recipe = Category::where('category_id','=' ,5)->get();
        // dd($recipe);
        // dd($category);
      

        // $rec = Recipe::find($recipes)->recipe;
        // dd($recipes);

        return view('categories.single-category', compact('recipes','category'));
    }


}
