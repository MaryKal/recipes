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
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' =>
    [
        'auth',
        'admin',
    ],
], function () {

    Route::get('/', 'AdminController@index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UserController');
    Route::resource('/recipes', 'RecipeController');
    Route::resource('/comments', 'CommentsController');
});

//Resource controllers
//
Route::resource('/recipes', 'RecipeController')->middleware('auth');
Route::post('/recipes/add', 'RecipeController@store');
Route::put('/recipe/{id}', 'RecipeController@update');
Route::get('/search', 'HomeController@search');
Route::get('/recipes', 'RecipeController@index');
// Route::resource('/recipes', 'RecipeController')->middleware('auth');
Route::get('/recipe/{id}', 'RecipeController@show');
Route::post('block-user/{id}', 'UserController@block')->name('block.user');
Route::post('unblock-user/{id}', 'UserController@unBlock')->name('unblock.user');



Route::resource('/products', 'ProductController');
Route::resource('/comments', 'CommentsController');
Route::resource('/home', 'HomeController');

//Home controller
Route::get('/home', 'HomeController@index')->name('home');

    //Home categogries
    Route::get('/categories', 'HomeController@categoriesList');
    Route::get('/categories/{id}', 'HomeController@singleCategory');


    //Get user Profile
    Route::get('/user', 'UserController@getProfile')->middleware('auth')->name('profile');
    Route::get('/user/{id}', 'UserController@userInfo');



//
// Route::post('/recipes/add', 'RecipeController@store');

//LIkes
Route::get('/like/{recipe_id}/liked', 'LikesController@like')->middleware('auth');
Route::get('/like/{recipe_id}/disliked', 'LikesController@dislike')->middleware('auth');

