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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/file/index', 'FileController@index')->name('file_index');
    Route::get('/file/create', 'FileController@create')->name('file_create');
    Route::POST('/file/store', 'FileController@store')->name('file_store');
    Route::get('/file/edit/{id}', 'FileController@edit')->name('file_edit');
    Route::POST('/file/update/{id}', 'FileController@update')->name('file_update');
    Route::get('/file/delete/{id}', 'FileController@destroy')->name('file_destroy');
    Route::get('/file/show/{id}', 'FileController@show')->name('file_show');
    Route::get('/file/download/{id}', 'FileController@download')->name('file_download');
});

