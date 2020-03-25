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
                Route::resource('/categories', 'CategoryController');
                Route::resource('/users', 'UserController');
                Route::resource('/recipes', 'RecipeController');


            });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories', 'HomeController@categoriesList');
Route::get('/categories/{id}', 'HomeController@singleCategory');
// Route::get('/recipes/{id}', 'UserController@getRecipes');
Route::get('/user', 'UserController@getProfile')->middleware('auth')->name('profile');
// Route::get('/user', 'UserController@userInfo');

// Route::get('/user/{id}', [
//     'uses' => 'UserController@getProfile',
//     'as' => 'user.index',
//     'middleware' => ['auth'],
//     ]);


Route::resource('/recipes', 'RecipeController');
// Route::get('/recipes/create', 'RecipeController@autocomplete');
// Route::get('autocomplete', 'RecipeController@autocomplete')->name('autocomplete');

// Route::get('recipes/{id}', 'RecipeController@show');
Route::resource('/products', 'ProductController');
Route::resource('/home', 'HomeController');

// Route::get('/category', 'HomeController@index');





