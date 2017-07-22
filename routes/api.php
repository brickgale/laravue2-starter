<?php

// use Illuminate\Http\Request;

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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api) {
	$api->post('user/authenticate', 'App\Http\Controllers\Auth\LoginController@authenticateAny');
});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
	$api->get('user', 'App\Http\Controllers\Auth\LoginController@show');
});