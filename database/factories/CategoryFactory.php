<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $name = $faker->words(2, true);
    return [
        'name' => $name,
        'slug' => \Str::slug($name, '-'),
        'img' => '123',
    ];
});
