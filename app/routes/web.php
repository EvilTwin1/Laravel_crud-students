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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
})->name('locale');

Route::get('/', 'StudentController@index')->name('list');
Route::get('/create', 'StudentController@create')->name('create');
Route::get('/show/{id}', 'StudentController@show')->name('show');
Route::get('/edit/{id}', 'StudentController@edit')->name('edit');
Route::get('/search', 'StudentController@search')->name('search');

Route::post('/store', 'StudentController@store')->name('store');
Route::put('/update/{id}', 'StudentController@update')->name('update');
Route::get('/delete/{id}', 'StudentController@delete')->name('delete');
