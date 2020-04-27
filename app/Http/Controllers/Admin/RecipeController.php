<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Product;
use App\Comment;
use App\Likes;
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
        $recipes = Category::all('id', 'name')->pluck('name', 'id');
        $products = Product::all();

        return view('admin.recipes.create', compact('recipe','recipes','products'));
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
            // 'img-recipe' => '',
            'user_id' => '',
            'slug' => '',
            'products' => 'required'
        ]);
    
        $user = auth()->user()->id;
        $recipe = new Recipe;

    
        $recipe->name = $request->name;
        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = $user;
        $recipe->slug = $request->slug;
        // $recipe->steps = $request->products;
        $recipe->time = $request->time;
        $recipe->persons = $request->persons;
     
        // $request->request->add(['user_id' => $user]);
    
        $file = $request->file('img');
        if ($file) {
            $fName = $file->getClientOriginalName();
            $file->move('images', $fName);
            $recipe->image = 'images/'.$fName;
        }
    
        $recipe->save();
    
        $singlePrductValue = $request->products;
        $singleCountValue = $request->count;        
        $singleUnitValue = $request->unit;
        $fullItems = [];
    
        $index=0;
        foreach($singlePrductValue as $key=>$product){
            $fullItems[$product] = ['count'=>$singleCountValue[$index], 'unit'=>$singleUnitValue[$index]];
            $index++;
        }
    
        $steps = [];
        $i = 0;
        foreach($request->stepText as $text){
            $img = $request->file('stepImage')[$i];
            $fName = $img->getClientOriginalName();
            $img->move('images/recipes', $fName);
            $steps[] = ['step' => $text, 'image' => 'images/recipes/'.$fName];
            $i++;
        };
     
        $recipe->steps()->createMany($steps);
        $recipe->products()->sync($fullItems);
    dd($request->all());
        return response()->json(['name' => 'ok']);
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
        $likes =  Likes::where('recipe_id', $id)->get()->count();
        $comments = Comment::where('recipe_id', '=', $id)->get();
        // // $ingridients = RecipeProduct::where('recipe_id', '=', $id)->get();

        // // dd($rec);
        return view('admin.recipes.show', compact('recipe','likes','comments'));
        
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
    public function destroy(Recipe $recipe, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return back();
    }

   
}
