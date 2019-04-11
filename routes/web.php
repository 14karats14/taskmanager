<?php

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

use \Illuminate\Http\Request;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'TaskController@index');
    Route::post('/task/', 'TaskController@store')->name('task.store');
    Route::post('/check/{task}', 'TaskController@check')->name('task.check');
    Route::delete('/{task}', 'TaskController@destroy')->name('task.delete');


    Route::group(['middleware' => 'admin'], function () {

        Route::get('admin/user', 'AdminController@users')->name('admin.users');
        Route::get('admin/user/{user}', 'AdminController@user')->name('admin.user');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/change_locale', function () {
    App::setLocale('ru');
    return redirect('/');
});