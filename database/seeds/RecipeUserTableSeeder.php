<?php

use Illuminate\Database\Seeder;
use App\RecipeUser;

class RecipeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            factory(App\RecipeUser::class,
                    10)->create();
        }
    }
}
