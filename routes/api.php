<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\v1\AccountController;
use App\Http\Controllers\API\v1\BudgetController;
use App\Http\Controllers\API\v1\CategoryController;
use App\Http\Controllers\API\v1\FamilyMemberController;
use App\Http\Controllers\API\v1\OrganizationController;
use App\Http\Controllers\API\v1\SubscriptionPlanController;
use App\Http\Controllers\API\v1\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    /*****Category API******/

});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('organizations', OrganizationController::class);
    Route::apiResource('family-members', FamilyMemberController::class);
    Route::apiResource('accounts', AccountController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('subscription-plans', SubscriptionPlanController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::apiResource('budgets', BudgetController::class);
});

