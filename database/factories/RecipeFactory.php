<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    $name = $faker->words(2, true);

    return [
        'name' => \Str::random(10),
        'slug' => \Str::slug($name, '-'),
        'image' => '',
        'describe' => $faker->text(200),
        // 'steps' => $faker->text(200),
        // 'likes' => $faker->randomNumber(NULL, false),
        'time' => $faker->randomNumber(NULL, false),
        'persons' => $faker->randomNumber(NULL, false),
        'user_id' => App\User::all('id')->pluck('id')->random(),
        'category_id' => App\Category::all('id')->pluck('id')->random(),

        
    ];
});
