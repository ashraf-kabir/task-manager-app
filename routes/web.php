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

Route::get('/', function () {
    // return view('welcome');
    return redirect(route('login'));
});

// Auth::routes();

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('todos', 'TodosController@index');
    Route::get('todos/{todo}', 'TodosController@show');
    Route::get('new-todos/', 'TodosController@create');
    Route::post('store-todos', 'TodosController@store');
    Route::get('todos/{todo}/edit', 'TodosController@edit');
    Route::post('todos/{todo}/update-todos', 'TodosController@update');
    Route::get('todos/{todo}/delete', 'TodosController@destroy');

    Route::get('trashed', 'TodosController@trashed');
    Route::get('trashed/{todo}/kill', 'TodosController@kill');
    Route::get('trashed/restore/{todo}', 'TodosController@restore');

    // Route::get('trashed', [
    //     'uses' => 'TodosController@trashed',
    //     'as' => 'todos.trashed'
    // ]);

    // Route::get('trashed/{todo}/kill', [
    //     'uses' => 'TodosController@kill',
    //     'as' => 'todos.kill'
    // ]);

    // Route::get('trashed/restore/{todo}', [
    //     'uses' => 'TodosController@restore',
    //     'as' => 'todos.restore'
    // ]);

    Route::get('todos/{todo}/complete', 'TodosController@complete');
    Route::get('todos/{todo}/incomplete', 'TodosController@incomplete');
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
});
