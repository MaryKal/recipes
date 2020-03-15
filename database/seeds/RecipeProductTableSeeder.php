<?php

use Illuminate\Database\Seeder;
use App\RecipeProduct;

class RecipeProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            factory(App\RecipeProduct::class,
                    10)->create();
        }
    }
}
