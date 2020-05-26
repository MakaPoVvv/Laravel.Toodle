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
    return view('welcome');
});

Auth::routes();

Route::get('/home/{id}', 'TaskController@index')->name('home');

Route::post('/tasks', 'TaskController@store')->name('tasks.store');

Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');

Route::get('/tasks/{id}', 'TaskController@show')->name('tasks.show');

Route::patch('/tasks/{id}', 'TaskController@complete')->name('tasks.complete');

Route::get('/tasks/{id}/edit', 'TaskController@edit')->name('tasks.edit');

Route::put('/tasks/update/{id}', 'TaskController@update')->name('tasks.update');

Route::delete('/tasks/{id}', 'TaskController@destroy')->name('tasks.destroy');

Route::delete('/tasks/delete/completed', 'TaskController@destroyCompleted')->name('tasks.destroyCompleted');

Route::get('/home/{id}/account', 'UserController@index')->name('account');

