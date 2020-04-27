<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\User;
use App\RecipeUser;
use App\Auth;
use App\Recipe;
use App\Likes;
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
        $liked = Likes::where('user_id', $user)->get();
        // dd($liked);


        return view('user.index', compact('user', 'recipes','liked'));
    }
    
    public function userInfo($id)
    {
        // dd($id);

        // $user = User::where('id',$id)->first();
        $user = User::find($id);
        // $recipe = Recipe::where('id', $id)->first();

        // dd($user);
        // $recipes = Recipe::find($user)->recipe;
        // $recipes = User::find($user)->recipe;
        $liked = Likes::where('user_id', $user)->get();

        $recipes = Recipe::where('user_id',$user->id)->get();
        // dd($user);


        return view('user.profile', compact('recipes','user', 'liked'));
    }
    public function block($id)
    {
        $user = User::find($id);
        $user->blocked_date = now();
        $user->role = 'blocked';
        $user->save();
        // return $user->blocked_date->getTimestamp();
        return back();

    }
    public function unBlock($id)
    {
        $user = User::find($id);
        $user->blocked_date = null;
        $user->role = null;
        $user->save();
        // return $user->blocked_date->getTimestamp();
        return back();

    }
}
