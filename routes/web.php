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

Route::post('/p', 'TaskController@store')->name('tasks.store');

//Route::post('/tasks/{id}', 'TaskController@show')->name('tasks.show');
