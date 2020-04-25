<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->text(50),
        'recipe_id' => App\Recipe::all('id')->pluck('id')->random(),
        'user_id' => App\User::all('id')->pluck('id')->random(),
    ];
});
