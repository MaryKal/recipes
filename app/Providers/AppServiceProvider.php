<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Category;
use App\Recipe;
use View;

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

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('ADMIN PANEL');
            $event->menu->add([
                'text' => 'Categories',
                // 'url' => 'admin/categories',
                // 'label' => Category::all()->count(),
                'submenu' =>[
                    [
                        'text' => 'All categories',
                        'url' => 'admin/categories',
                        'label' => Category::all()->count(),
                    ],
                    [
                    'text' => 'Create category',
                    'url' => 'admin/categories/create',
                    ]
                ]
            ],
            [
                'text' => 'Users',
                'url' => '#',
                
            ],
            [
                'text' => 'Recipes',
                'url' => '#',   
                'submenu' =>[
                    [
                        'text' => 'All recipes',
                        'url' => '#',
                        // 'label' => Category::all()->count(),
                    ],
                    [
                    'text' => 'Create recipe',
                    'url' => '#',
                    ]
                ]             
            ],
            
            [
            'text' => 'Comments',
            'url' => '#',

            ]
        );
        });

        
    }
}
