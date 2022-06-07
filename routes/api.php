<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('/get_users', [UserController::class, 'getAllUsers']);
Route::get('/get_restaurants', [UserController::class, 'getAllRestaurants']);
Route::post('/add_restaurant', [UserController::class, 'addRestaurant']);
Route::post('/add_user', [UserController::class, 'addUser']);
