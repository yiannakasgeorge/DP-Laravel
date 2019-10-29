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

// Route::get('/', function () {
//     return view('master');
// });

// linking admin routes
require 'admin.php';
// // routes for admin views
// Route::view('/admin', 'admin.dashboard.index');
// Route::view('/admin/login', 'admin.auth.login');

Route::get('/wholegrain', 'WholegrainWebController@index');
   
Route::get('/scraper', function() {
    return view('scraper');
});
