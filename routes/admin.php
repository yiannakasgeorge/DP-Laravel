<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|Register admin routes for app.
|
|
*/

/*
Routes group to prefix all our admin routes with /admin
Login routes: a) GET (/admin/login) admin login page
(b) POST (/admin/login) where we will send the POST request for authentication
(c) Logout route (/admin/logout) GET request
(d) Dashboard route (route group so that all admin routes under the group will be protected by the admin guard)
*/


Route::resource('admin/content', 'Admin\ContentController');
Route::apiResource('admin/content', 'Admin\ContentController');
Route::post('admin/content/updateStatus', 'Admin\ContentController@updateStatus')->name('content.updateStatus');
Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

       
        Route::get('/', function () {
            return redirect()->intended(route('content.index'));
        })->name('admin.dashboard');
     

    });

 
});