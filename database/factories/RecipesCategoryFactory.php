<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipesCategory;
use Faker\Generator as Faker;

$factory->define(RecipesCategory::class, function (Faker $faker) {
    return [
            'recipe_id' => App\Recipe::all('id')->pluck('id')->random(),
            'category_id' => App\Category::all('id')->pluck('id')->random(),
            // 'recipe_id' => factory('App\RecipesCategory')->create()->id,
            // 'category_id' => factory('App\RecipesCategory')->create()->id,
            // 'user_id' => factory('App\RecipesCategory')->create()->id,
    ];
});

