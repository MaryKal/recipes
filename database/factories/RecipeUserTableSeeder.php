<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipeUser;
use Faker\Generator as Faker;

$factory->define(RecipeUser::class, function (Faker $faker) {
    return [
        'recipe_id' => factory('App\RecipesCategory')->create()->id,
        'product_id' => factory('App\RecipesCategory')->create()->id,
    ];
});
