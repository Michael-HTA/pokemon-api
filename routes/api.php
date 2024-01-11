<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Class_;

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

Route::resource('/card',CardController::class);
Route::get('/filter/set/{id}',[CategoryController::class,'set']);
Route::get('/filter/type/{id}',[CategoryController::class,'type']);
Route::get('/filter/rarity/{id}',[CategoryController::class,'rarity']);
