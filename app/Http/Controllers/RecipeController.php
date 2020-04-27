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
    public function index(Request $request)
    {
        $recipes = Recipe::paginate(5);

        


        // $likes = Likes::where('reecipe_id', )

        // dd($recipes);

        return view('recipes.index', compact('recipes'));
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

    //
    
public function store(Request $request)
{
    // dd($request->all());

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
    $recipeProducts = new RecipeProduct;

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

    // return response()->json(['name' => 'ok']);
    return redirect('/user');

    // return back();
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

        $recipe = Recipe::find($id);
        $likes =  Likes::where('recipe_id', $id)->get()->count();
        $comments = Comment::where('recipe_id', '=', $id)->get();
        // // $ingridients = RecipeProduct::where('recipe_id', '=', $id)->get();

        // // dd($rec);
        return view('recipes.show', compact('recipe','likes','comments'));

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
        // dd($recipe);
        $recipes = Category::all('id', 'name')->pluck('name', 'id');
        // $products = Product::all();

        $recProducts = RecipeProduct::where('recipe_id', $id)->get();

        // dd($product);

        return view('recipes.edit', compact('recipe', 'recipes', 'recProducts'));
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
        //  dd($request->all());
        
        $request->validate([
            'name' => 'required|max:100|min:3',
            'describe' => 'required|min:3',
            'category_id' => 'required',
            'user_id' => '',
            'products' => 'required',
            'time' => 'required',
            'persons' => 'required'
        ]);

        $user = auth()->user()->id;
        

        $recipe =  Recipe::find($id);
            // dd($recipe);

        $recipe->name = $request->name;
        $recipe->describe = $request->describe;
        $recipe->category_id = $request->category_id;
        $recipe->user_id = $user;
        $recipe->slug = $request->slug;
        // $recipe->steps = $request->products;
        $recipe->time = $request->time;
        $recipe->persons = $request->persons;
        // dd($request->all());
     
        // $request->request->add(['user_id' => $user]);

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move('images', $fName);
            $recipe->image = 'images/'.$fName;
        }
        $recipe->update();
             

        $singlePrductValue = $request->products;
        $singleCountValue = $request->count;        
        $singleUnitValue = $request->unit;
        

        $index=0;
        $recipe->products()->detach();
        foreach($singlePrductValue as $key=>$product){
            $fullItems = [];
            $fullItems[$product] = ['count'=>$singleCountValue[$index], 'unit'=>$singleUnitValue[$index]];
            $index++;
            $s=$recipe->products()->attach($fullItems);
        }

        $steps = [];
        $i = 0;
        // dd($request->file('stepImage'));
        $recipe->steps()->delete();


        foreach($request->stepText as $text){
            $m = [];
            $m['step'] = $text;
            if($request->existsStepImage){
                foreach($request->existsStepImage as $try){
                    $m['image'] = $try;

                }
        //    dump($m);

            }
            else{
                if(isset($request->file('stepImage')[$i]))
                {
                $img = $request->file('stepImage')[$i];           
                // dump($img);
                    
                if($img){
                    $fName = $img->getClientOriginalName();
                    $img->move('/images/recipes', $fName);
                    $m['image']  =  '/images/recipes/'.$fName;
                }
            }
                    $i++;
            }
           $steps[] = $m;
        //    dump($steps);

            
        // $recipe->steps()->attach($steps);

        };
    
    // dd($steps);
        $recipe->steps()->createMany($steps);
        // $recipe->steps()->attach();

        
        // dd($request->all());
        // $recipe->update();
        // return response()->json(['name' => 'ok']);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return back();
    }
    
    }
