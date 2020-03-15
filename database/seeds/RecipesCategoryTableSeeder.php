<?php

use Illuminate\Database\Seeder;

class RecipesCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RecipesCategory::class,
                10)->create();
    }
}
