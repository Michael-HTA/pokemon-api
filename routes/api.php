<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::prefix('v1')->group(function(){
    Route::post('/login',[UserController::class,'login']);
    Route::post('/register',[UserController::class,'register']);
});

Route::prefix('v1')->middleware(['auth:sanctum'])->group(function(){
    Route::resource('/card',CardController::class);
    Route::get('/filter/{id}/set',[CategoryController::class,'set']);
    Route::get('/filter/{id}/type',[CategoryController::class,'type']);
    Route::get('/filter/{id}/rarity',[CategoryController::class,'rarity']);
    Route::get('/logout',[UserController::class,'logout']);
});
