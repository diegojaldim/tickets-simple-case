<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

$router->group(['prefix' => '/v1'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return 'Api v1 on!';
    });

    $router->group(['prefix' => '/tickets'], function () use ($router) {
        $router->get('/', [TicketController::class, 'getAllData']);
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
