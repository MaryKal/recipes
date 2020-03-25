<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use App\Http\Controllers\DB;
use App\Category;
use App\Recipe;
use App\Product;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

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
        
        // dd($recipes);

        return view('recipes.all-recipes', compact('recipes'));
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
        $products = Product::all();

        return view('recipes.create', compact('recipe','recipes'));
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

            // 'img' =>'image|mimes:jpeg,png,jpg,gif,svg:max:2048',

        ]);

        $user = auth()->user()->id;
        $recipe = new Recipe;
        $recipe->name = $request->name;

        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = $user;
        $recipe->slug = $request->slug;
        // dd($request->all());


        $recipe->save();
        return redirect('/user/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $qw = Recipe::find(1)->users;
        // dd($qw);
        
        $recipe = Recipe::where('id', $id)->first();
        // $user = $recipe->user_id;
        // dd($user);
        // $us = User::where('id', $user)->first();
        $rec = Recipe::where('user_id',$recipe->user_id)->get()->count();
     

        return view('recipes.single-recipe', compact('recipe','rec'));

    //     $user = auth()->user()->id;
    //    $recipes = User::find($user)->recipe;        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $recipes = Category::all('id','name')->pluck('name','id');

        // dd($category);

        return view('recipes.edit', compact('recipe','recipes'));
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
    
   
    // public function autocomplete(Request $request){

    //     $product = $request->get('product');

    //     $results = array();
        
    //     $queries = \DB::table('products')
    //         ->where('name', 'LIKE', '%'.$product.'%')
    //         ->get();
        
    //     foreach ($queries as $query)
    //     {
    //         $results[] = [ 'id' => $query->id, 'product' => $query->name ];
    //     }
    //     // dd($results);

    // return view('recipes.create', compact( response()->json($results)));
    // }
    
}
