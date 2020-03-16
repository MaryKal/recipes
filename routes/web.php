<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=>
        [
            'auth',
            'admin',    
        ],
            ],function(){

                Route::get('/', 'AdminController@index');
                // Route::resource('/categories', 'CategoryController');
                // Route::resource('/products', 'ProductController');


            });


Route::resource('/categories', 'CategoryController');
Route::resource('/recipes', 'RecipeController');
Route::resource('/products', 'ProductController');
Route::resource('/home', 'HomeController');

// Route::get('/category', 'HomeController@index');





