<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//API Routes
Route::middleware(['auth:api'])->group(function () {
    Route::post('/v1/posts', 'Admin\ApiController@post')->name('post');
    Route::get('/v1/posts', 'Admin\ApiController@get')->name('get');
    Route::put('/v1/posts', 'Admin\ApiController@put')->name('put');   
    Route::delete('/v1/posts', 'Admin\ApiController@delete')->name('delete'); 
});

Route::get('user', 'AuthController@details');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');


