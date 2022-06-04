<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['jwt'])->group(function () {

    // Users Routes
    Route::prefix('users/')->group(function () {
        Route::get('me', [AuthController::class, 'me'])->name('user.me');
        Route::post('', [UserController::class, 'store'])->name('users.store')->withoutMiddleware(['jwt']);
        Route::get('confirm-email/{userUuid}', [UserController::class, 'verifyEmail'])->name('users.confirm_email')->withoutMiddleware(['jwt'])->where('userUuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
        Route::put('', [UserController::class, 'update'])->name('users.update');
        Route::delete('{userUuid}', [UserController::class, 'delete'])->name('users.delete');
    });

    // Auth Routes
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('login', [AuthController::class, 'login'])->name('login');
