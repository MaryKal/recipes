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
    public function getProfile(User $id)
    {
        
            // dd(\Auth::user()->isUser());
            // $user = \Auth::user($id)->name;
        return view('user.index');

    }
    public function userInfo()
    {
        // $category = Category::find($id);

        // $cat = Category::where('id', $id)->first()->id;
        // $recipes = Category::find($cat)->recipe;
       $user = auth()->user()->id;
       
    //    $us = $user->id;
        // $us = $user->id;//id пользователя
       
        // $rec = Recipe::where('user_id',$us)->first();//в таблице рецептов id пользователя равно us
        // $recipes = Recipe::find($rec);
        $recipes = User::find($user)->recipe;
        // $rec = $recipes->user_id;
        // dd($recipes);
        // $us = User::where('id', $id)->first()->id;
        // $users = User::find($us)->recipe;


        return view('user.index', compact('user','recipes'));
    }
    
}

    

