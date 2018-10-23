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

Route::get('/', function()
{
    return view('welcome');
});

Route::get('admin/login', 'UserController@getLoginAdmin')->name('getlogin');
Route::post('admin/login', 'UserController@postLoginAdmin')->name('postlogin');

Route::middleware(['adminLogin'])->prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
    	Route::get('list', 'CategoryController@getList');
    	Route::get('add', 'CategoryController@getAdd');
        Route::post('add', 'CategoryController@postAdd');
    });

    Route::prefix('slide')->group(function () {
        Route::get('list', 'SlideController@getList')->name('list_slide');

        Route::get('add', 'SlideController@getAdd')->name('add_slide');
        Route::post('add', 'SlideController@postAdd')->name('add_slide');

        Route::get('edit/{id}', 'SlideController@getEdit')->name('edit_slide');
        Route::post('edit/{id}', 'SlideController@postEdit')->name('edit_slide');

        Route::get('delete/{id}', 'SlideController@getDelete')->name('delete_slide');
    });
});
