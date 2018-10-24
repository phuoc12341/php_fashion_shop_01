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

Route::get('home', function()
{
    return view('pages.home');
});

Route::get('product_detail', function()
{
    return view('pages.product_detail');
});

Route::group(['prefix'=>'admin'], function()
{
    Route::group(['prefix'=>'slide'], function()
    {
        Route::get('list', 'SlideController@getList')->name('list_slide');

        Route::get('add', 'SlideController@getAdd')->name('add_slide');
        Route::post('add', 'SlideController@postAdd')->name('add_slide');

        Route::get('edit/{id}', 'SlideController@getEdit')->name('edit_slide');
        Route::post('edit/{id}', 'SlideController@postEdit')->name('edit_slide');

        Route::get('delete/{id}', 'SlideController@getDelete')->name('delete_slide');
    });
});
