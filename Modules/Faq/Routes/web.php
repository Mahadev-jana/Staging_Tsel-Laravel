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

Route::prefix('admin/faq')->group(function() {
    Route::get('/', 'FaqController@index')->name('faq');
    Route::get('/submit', 'FaqController@store')->name('submit');
    Route::get('/edit', 'FaqController@edit')->name('edit');
    Route::get('/delete/{id}', 'FaqController@destroy')->name('delete');
});
