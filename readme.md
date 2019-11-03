HOW TO \
\
-Clone repo from https://github.com/yiannakasgeorge/DP-Laravel.git \
-Run “npm install” to install node_modules\
-Run “composer update” to load all composer repositories/depedencies required\
-Create a new .env file in you root dir and copy all text from .env.example\
-Make the necessary changed to the DB related fields in .env file\
-Add the two new variables in the .env file\
\
SIGMALIVE_BASE_URL = https://www.sigmalive.com/ \
SIGMALIVE_SCRAPER_URL = ${SIGMALIVE_BASE_URL}/news/local \
\
-Run “php artisan migrate” to generate all DB tables from the migration folder\
-Run “php artisan key:generate” in your root folder to generate Laravel’s app key\
-Install Valet (https://laravel.com/docs/5.7/valet)\
-Navigate to your ‘public’ directory and type valet link mysite\
-To install seeds at this stage  run “php artisan migrate:refresh --seed”\
-Congrats! Now open your browser and navigate to mysite.test\


npm run dev \
npm run watch \
npm run hot \
npm run prod \
\
\
URL's\
http://mysite.test/wholegrain \
http://mysite.test/scraper \
http://mysite.test/admin \
\
\
API\ 
http://mysite.test/api/v1/register \
i.e {"name": "", "email": "", "password": "", "confirm_password": ""} \
\
http://mysite.test/api/v1/login \ 
i.e {"email":"", "password" :""} \
\
http://mysite.test/api/v1/posts [POST] \
http://mysite.test/api/v1/posts/{id} [GET, DELETE, PUT] \
\
Example: POST (new post) at http://mysite.test/api/v1/posts/ \
 {"title": "this is my title", "content": "this is my content", "section": "about", "image": "path", "active": 1} \
\
You may post an image as well by adding this param : uploads[] in postman and select file(s)
