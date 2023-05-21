<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\PermissionController;

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



Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('verify-token', [AuthController::class, 'verifyToken']);
    Route::prefix('v1')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('user', UserController::class);
            Route::resource('role', RoleController::class);
            Route::resource('permission', PermissionController::class);
        });
    });
});