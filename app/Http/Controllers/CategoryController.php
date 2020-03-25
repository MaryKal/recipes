<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
    
        // dd($categories);
    
        return view('categories.all-categories', compact('categories'));
    }
    public function show($id)
    {
        $category = Category::find($id);
        dd($category);
    // $categories = Category::all();
     $recipes = Recipe::where('category_id', $category)->first()->recipe;
    //  $recipes = Category::find($cat)->recipe;

    // dd($category);

    return view('categories.single-category', compact('category','recipes'));
    }
}
