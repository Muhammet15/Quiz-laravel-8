# Quiz-laravel-8
php8.0^
composer update
composer dump-autoload 
cp .env.example .env
php artisan migrate:fresh --seed
php artisan key:generate
php artisan config:cache
php artisan cache:clear
php artisan ui bootstrap
//php artisan ui bootstrap --auth
npm install
npm run dev (sürüm kontrol)

create storage folder 
php 8.0 laravel 8.0 , xampp server mysql 3306 

phpmyadmin veya mysql
mysql -u root -p quiz < "quiz_laravel_8.sql" -> for sql dumb import
