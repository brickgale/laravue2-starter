# laravue2-starter [![Build Status](https://travis-ci.org/brickgale/laravue2-starter.svg?branch=master)](https://travis-ci.org/brickgale/laravue2-starter)
> :ok_hand: Skeleton SPA for Laravel 5.4 and Vue2

## Setup
* Run `composer install` and `npm install`
* Configure `.env` file. Make sure APP_URL points to correct url.
* Make sure `APP_ENV`and `MIX_APP_ENV` are the same as well as `APP_URL` and `APP_MIX_URL`.
* Generate app key, `php artisan key:generate`.
* Run Migrations and seeders, `php artisan migrate` & `php artisan db:seed`.
* Build js files `npm run watch` (for auto compile) or `npm run dev`/`npm run prod`.
