<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Likes;

class LikesController extends Controller
{
    public function like($recipe_id)
    {
        $like = Likes::create(['recipe_id' => $recipe_id, 'user_id' => auth()->user()->id]);

        $count = Likes::where('recipe_id', $recipe_id)->get()->count();

        return response()->json($count);
    }
    public function dislike($recipe_id)
    {
        $id= Likes::where('recipe_id', $recipe_id)->where('user_id', auth()->user()->id)->first()->id;
        Likes::destroy($id);
        $count= Likes::where('recipe_id' ,  $recipe_id)->get()->count();
        return response()->json($count);
}
    }

