<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Test api
 */
Route::get('/test', function(){
    return response()->json([
        'names' => ['Paolo', 'Luca', 'Michela', 'Chiara'],
        'lorem' => 'ipsum'
    ]);
});

/**
 * Get blog post
 */

Route::namespace('Api')->group(function(){

    Route::get('posts', 'PostController@index');
});