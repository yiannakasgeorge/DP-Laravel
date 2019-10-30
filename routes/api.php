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
   
    Route::post('posts', 'Admin\ContentController@post')->name('content.post');
    Route::get('posts', 'Admin\ContentController@get')->name('content.get');
    Route::put('posts', 'Admin\ContentController@put')->name('content.put');   
    Route::delete('posts', 'Admin\ContentController@delete')->name('content.delete'); 
});

Route::get('user', 'AuthController@details');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');



// Route::middleware('auth:api')->group(function () {
//     Route::get('user', 'PassportController@details');
 
//     Route::resource('products', 'ProductController');
// });