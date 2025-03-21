<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/otos', 'App\Http\Controllers\API\LotteryController@otos');
Route::get('/skandi', 'App\Http\Controllers\API\LotteryController@skandi');
Route::get('/hatos', 'App\Http\Controllers\API\LotteryController@hatos');
Route::get('/eurojackpot', 'App\Http\Controllers\API\LotteryController@eurojackpot');
