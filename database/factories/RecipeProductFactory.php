<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RecipeProduct;
use Faker\Generator as Faker;

$factory->define(RecipeProduct::class, function (Faker $faker) {
    return [
        'recipe_id' => App\Recipe::all('id')->pluck('id')->random(),
        'product_id' => App\Product::all('id')->pluck('id')->random(),
    ];
});
