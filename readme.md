npm run dev, 
npm run watch,
npm run hot,
npm run prod,

http://public.test/scraper
http://public.test/admin
http://public.test/wholegrain


API 
http://public.test/api/v1/register  {"name": "", "email": "", "password": "", "confirm_password": ""}
http://public.test/api/v1/login  {"email":"", "password" :""}
http://public.test/api/v1/posts [GET,PUT,POST,DELETE] 

Route::middleware(['auth:api'])->group(function () {
    Route::post('/v1/posts', 'Admin\ApiController@post')->name('post');
    Route::get('/v1/posts/{id}', 'Admin\ApiController@get')->name('get');
    Route::put('/v1/posts/{id}', 'Admin\ApiController@put')->name('put');   
    Route::delete('/v1/posts/{id}', 'Admin\ApiController@delete')->name('delete'); 
});

Route::get('v1/user', 'AuthController@details');
Route::post('v1/login', 'AuthController@login');
Route::post('v1/register', 'AuthController@register');


Example: POST (new post) at http://public.test/api/v1/posts/
 {"title": "this is my title", "content": "this is my content", "section": "about", "image": "path", "active": 1}

You may post an image as well by adding this param : uploads[] in postman and select file(s)