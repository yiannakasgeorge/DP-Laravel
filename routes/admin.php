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
Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');
    
    });

});