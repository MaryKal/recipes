<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Shema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Category;
use App\Recipe;
use App\User;
use App\Product;
use App\Comment;
use App\RecipeProduct;
use View;
use Illuminate\Support\Facades\Schema;
use App\Likes;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
       
         View::share('categories', Category::all());
        View::share('recipes', Recipe::all());
        View::share('users', User::all());
        View::share('products', Product::all());
        View::share('comments', Comment::all());
        View::share('recipeProducts', RecipeProduct::all());
        View::share('likes', Likes::all());

        Schema::defaultStringLength(191);


        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('ADMIN PANEL');
            
            $event->menu->add([
                
                'text' => 'Categories',
                'icon' => 'fas fa-hamburger',
                // 'url' => 'admin/categories',
                // 'label' => Category::all()->count(),
                'submenu' =>[
                    [
                        'text' => 'All categories',
                        'url' => 'admin/categories',
                'icon' => '',
                        
                        'label' => Category::all()->count(),
                    ],
                    [
                    'text' => 'Create category',
                    'url' => 'admin/categories/create',
                'icon' => '',

                    ]
                ]
            ],
            
            [
                'text' => 'Recipes',
                'url' => '#',   
                'icon' => 'fas fa-hamburger',

                'submenu' =>[
                    [
                        'text' => 'All recipes',
                        'url' => 'admin/recipes',
                    'icon' => '',

                        // 'label' => Category::all()->count(),
                    ],
                    [
                    'text' => 'Create recipe',
                    'url' => 'admin/recipes/create',
                    'icon' => '',

                    ]
                ]             
            ],
            [
                'text' => 'Users',
                'url' => 'admin/users',
                'icon' => 'fas fa-users',
                
            ],
            
            [
            'text' => 'All comments',
            'url' => 'admin/comments',
            'icon' => 'fas fa-bullhorn',


            ],
            [
                'text' => '',
                'search' => false,
                'topnav' => true,
                'icon' =>false,
            ],
            [
                'text' => 'Back to website',
                'url' => '/',
                'topnav' => true,
                'icon'    => 'fas fa-undo-alt',
            ],
           
        }
});
        

        
        
    }
}
