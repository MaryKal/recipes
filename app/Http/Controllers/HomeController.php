<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Recipe;
use App\Category;
use app\User;
use App\Likes;

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
        
        // if(\Auth::user()->isBlocked()){
        //     $message = 'Your account has been blocked.';
                  
        //         return auth()->logout();
        // };
    // }
        // $categoriesList = $this->categoriesList();
        // $singleCategory = $this->singleCategory($id);
        // $rec = Recipe::find($id)->get();
        $recipes = $this->newestRecipes();
        $categories = $this->popularCategories();
        // $singleRecipe = $this->singleRecipe($rec);
        // $allRecipes = $this->allRecipes();
       
        // $user = $this->getProfile();
        // $user = $this->userProfile($id);

        //    $singleRecipe = $this->singleRecipe();

        return view('home.index', compact('recipes', 'categories'));
    }
    public function newestRecipes()
    {
        // $recipe = Recipe::all();
        // dd($recipe->id);
        $newestRecipes = Recipe::orderBy('id', 'desc')->take(4)->get();
        // $count = Likes::where('recipe_id', $recipe->id)->get()->count();

        // $newestRecipes->describe;
       

        return $newestRecipes;
    }
    public function popularCategories()
    {
        $popularCategories = Category::orderBy('id', 'desc')->take(8)->get(); //добавить те, в которых больше всего рецептов

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
      

        return view('categories.single-category', compact('recipes','category'));
    }

public function search(Request $request)
{
    // $categories = Category::all();
    $search = $request->get('search');
    $category = $request->get('category');

$recipes = Recipe::where([ 
    ['name', 'LIKE', '%' . $search . '%'],
    ['category_id', 'LIKE', '%'.$category.'%']
  
])->paginate(5);
    // $items['result'] = Recipe::where([ 
    //     ['name', 'LIKE', '%' . $name . '%'],
      
    // ])->get();
    // dd($recipes);
    return view('recipes.search-result', compact('recipes', 'category'));
}

}
