<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')
    ->prefix('projects')
    ->group(function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/search', [ProjectController::class, 'search']);
        Route::get('/typesearch', [ProjectController::class, 'typeSearch']);
        Route::get('/detail/{slug}', [ProjectController::class, 'show']);
    });

//rotta per invio mail
Route::post('/contacts', [LeadController::class, 'store']);
