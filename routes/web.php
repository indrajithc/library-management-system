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

Route::get('/', function () {
    return view('welcome');
});	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 

Route::namespace('Admin')->prefix('admin')->middleware(  'auth.admin')->name('admin.')->group(function(){
    Route::resource('/users', "UserController" , [
        'except' => ['show' ]
    ]);
});

Route::namespace('Librarian')->prefix('librarian')->middleware(  'auth.librarian')->name('librarian.')->group(function(){
    Route::resource('/users', "UserController" , [
        'except' => ['show' ]
    ]);
});

