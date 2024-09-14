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
  return redirect(route('login'));
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false // Email Verification Routes...
]);

// Group routes that require authentication
Route::middleware(['auth', 'isActive'])->group(function () {
  Route::get('/home', 'HomeController@index')->name('home');

  // Todo Routes
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

  Route::get('todos/{todo}/complete', 'TodosController@complete');
  Route::get('todos/{todo}/incomplete', 'TodosController@incomplete');

  // Profile Routes
  Route::get('profile', 'ProfileController@edit')->name('profile.edit-profile');
  Route::put('profile', 'ProfileController@update')->name('profile.update-profile');

  // Password Routes
  Route::get('change-password', 'PasswordController@edit')->name('password.edit-password');
  Route::put('change-password', 'PasswordController@update')->name('password.update-password');

  // User Routes - Admin only
  Route::middleware(['isAdmin'])->group(function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/make-admin/{id}', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::post('users/make-regular/{id}', 'UsersController@makeRegular')->name('users.make-regular');
    Route::post('users/make-active/{id}', 'UsersController@makeActive')->name('users.make-active');
    Route::post('users/make-inactive/{id}', 'UsersController@makeInactive')->name('users.make-inactive');
    Route::get('users/add', 'UsersController@add')->name('users.create');
    Route::post('users/store', 'UsersController@store')->name('users.store');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::put('users/update/{id}', 'UsersController@update')->name('users.update');
  });
});
