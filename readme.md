# laravue2-starter
> :ok_hand: Skeleton SPA for Laravel 5.4 and Vue2

## Setup
* Run `composer install` and `npm install`
* Configure `.env` file. Make sure APP_URL points to correct url.
* Update `resources/assets/js/config.js`, APP_URL to the same on on `.env` file.
* Generate app key, `php artisan key:generate`.
* Run Migrations and seeders, `php artisan migrate` & `php artisan db:seed`.
* Build js files `npm run watch` (for hot reload) or `npm run dev`/`npm run prod`.
