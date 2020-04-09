<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\User;
use App\RecipeUser;
use App\Auth;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function getProfile()
    { 
        // $user = \Auth::user()->name;
        $user = auth()->user()->id;
        // dd($user);
        $recipes = Recipe::where('user_id', $user)->get();

        return view('user.index', compact('user', 'recipes'));
    }
    
    public function userInfo($id)
    {
        // dd($id);

        $user = User::where('id',$id)->first();
        // $recipe = Recipe::where('id', $id)->first();

        // dd($user);
        // $recipes = Recipe::find($user)->recipe;
        // $recipes = User::find($user)->recipe;
        $recipes = Recipe::where('user_id',$user->id)->get();

        // dd($user);


        return view('user.profile', compact('recipes','user'));
    }
}
