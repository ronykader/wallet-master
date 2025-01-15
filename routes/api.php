<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->prefix('categories')->group(function (){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');

    Route::get('{category}', [CategoryController::class, 'show'])->name('category.show');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
