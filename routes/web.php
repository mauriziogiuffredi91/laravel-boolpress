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


//auenticazione
Auth::routes();

//Auth::routes(['register' => false]);


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        
        //rotta per l'admin home
        Route::get('/', 'HomeController@index')->name('home');
        
        Route::resource('/posts', 'PostController');
    });


// Front Office
Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*");