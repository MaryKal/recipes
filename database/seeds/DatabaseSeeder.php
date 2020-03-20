<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RecipeTableSeeder::class);
        $this->call(RecipesCategoryTableSeeder::class);
        $this->call(RecipeProductTableSeeder::class);
        // $this->call(RecipeUserTableSeeder::class);



    }
}
