<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Warehouse

Instructions for setting up this project:

- Clone this repository
- run 'composer install'
- copy .env.example to .env and change credentials where necessary.
- run 'php artisan migrate'
- run 'php artisan db:seed'
- run 'php artisan key:generate'
- run 'php artisan jwt:secret' and answer 'yes' to the question that may come up.
- run 'php artisan serve' and then follow the link in the commandline.
(please note that in the .env.example the port of the application is set to 8000. If artisan serve gives you a different port you need to change this in the .env file.)

Right off the bat you can create a new account by following the registration link, or you can log in with the following credentials:
admin@admin.com / secret123
