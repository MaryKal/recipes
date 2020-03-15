<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Recipe;
use Faker\Generator as Faker;

$factory->define(Recipe::class, function (Faker $faker) {
    $name = $faker->words(2, true);

    return [
        'name' => \Str::random(10),
        'slug' => \Str::slug($name, '-'),
        'image' => '123',
        'describe' => $faker->text(200),
        'likes' => $faker->randomNumber(NULL, false),
        
    ];
});
