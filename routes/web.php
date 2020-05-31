<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::redirect('/', '/'.App::getLocale());

    Route::get('/{language}', function () {
        return view('welcome');
    });

Route::group(['prefix' => '{language}'], function(){
    Auth::routes();

});

    Route::get('/home/{language}/{id}', 'TaskController@index')->name('home');

    Route::post('/tasks/{language}', 'TaskController@store')->name('tasks.store');

    Route::get('/tasks/{language}/create', 'TaskController@create')->name('tasks.create');

    Route::get('/tasks/{language}/{id}', 'TaskController@show')->name('tasks.show');

    Route::patch('/tasks/{language}/{id}', 'TaskController@complete')->name('tasks.complete');

    Route::get('/tasks/{language}/{id}/edit', 'TaskController@edit')->name('tasks.edit');

    Route::put('/tasks/{language}/update/{id}', 'TaskController@update')->name('tasks.update');

    Route::delete('/tasks/{language}/{id}', 'TaskController@destroy')->name('tasks.destroy');

    Route::delete('/tasks/delete/{language}/completed', 'TaskController@destroyCompleted')->name('tasks.destroyCompleted');

    Route::get('/home/{language}/{id}/account', 'UserController@index')->name('account');
    Route::get('/home/{language}/{id}/account/edit', 'UserController@edit')->name('account.edit');
    Route::patch('/home/{language}/{id}/account/update/image', 'UserController@updateImage')->name('account.updateImage');
    Route::patch('/home/{language}/{id}/account/update', 'UserController@update')->name('account.update');
