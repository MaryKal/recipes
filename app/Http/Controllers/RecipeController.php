<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use App\Http\Controllers\DB;
use App\Category;
use App\Recipe;
use App\Product;
use App\User;
use App\Comment;
use App\Image;
use App\RecipeProduct;
use App\Likes;
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
        // $recipes = Recipe::all();
        // // $likes = Likes::where('reecipe_id', )

        // // dd($recipes);

        // return view('recipes.all-recipes', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('hi');
        $recipe = new Recipe();
        $recipes = Category::all('id', 'name')->pluck('name', 'id');
        $products = Product::all();

        return view('recipes.create', compact('recipe', 'recipes'));
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
            'steps' => 'min:3',
            // 'img-recipe' => '',
            'user_id' => '',
            'slug' => '',
        ]);

        $user = auth()->user()->id;
        $recipe = new Recipe;
        $recipeProducts = new RecipeProduct;

        $recipe->name = $request->name;
        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = $user;
        $recipe->slug = $request->slug;
        $recipe->steps = $request->steps;
        $recipe->time = $request->time;
        $recipe->persons = $request->persons;
     
        $request->request->add(['user_id' => $user]);

        $file = $request->file('img');
        if ($file) {
            $fName = $file->getClientOriginalName();
            $file->move('images', $fName);
            $recipe->image = 'images/'.$fName;
        }

        if ($request->file('image')) {
            foreach ($request->file('image') as $img) {
                $newName = $img->getClientOriginalName();
                $img->move('images/recipes', $newName);
            }
        };
        // dd($request->all());
        // $prod = $request->products;
        $recipe->save();
        // $recipe->products()->sync($request->products);
        // $recipe->products()->sync($request->products);

        $singlePrductValue = $request->products;
        $singleCountValue = $request->count;        
        $singleUnitValue = $request->unit;
        $fullItems = [];

        $index=0;
        foreach($singlePrductValue as $key=>$product){
            $fullItems[$product] = ['count'=>$singleCountValue[$index], 'unit'=>$singleUnitValue[$index]];
            // $ids[] = ['product_id' =>$singlePrductValue, 'recipe_id' => $recipe->id]; 
            $index++;
            // dd($recipe->id);
            // \DB::table('recipes_products')->insert($fullItems,$ids);      
        }
        $recipe->products()->sync($fullItems);

        return response()->json(['name' => 'ok']);
        // return redirect('/user/index');
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

        // $recipe = Recipe::where('id', $id)->first();
        // dd($recipe->users);
        $recipe = Recipe::find($id);
        $likes =  Likes::where('recipe_id', $id)->get()->count();
        // // $comments = Comment::where('recipe_id', '=', $id)->get();
        // // $ingridients = RecipeProduct::where('recipe_id', '=', $id)->get();

        // // dd($rec);
        return view('recipes.single-recipe', compact('recipe','likes'));

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
        $recipes = Category::all('id', 'name')->pluck('name', 'id');

        // dd($category);

        return view('recipes.edit', compact('recipe', 'recipes'));
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
    
    }
