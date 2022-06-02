<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

// Route::controller(UserController::class)->group(function () {
//     Route::post('user', 'store')->name('user.store');
// });

Route::prefix('users/')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('users.list');
    Route::post('', [UserController::class, 'store'])->name('users.store');
    Route::put('', [UserController::class, 'update'])->name('users.update');
    Route::delete('{userUuid}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('confirm-email/{userUuid}', function () {
        echo route('users.confirm_email', ['userUuid' => 'lihv'], true);
    })->name('users.confirm_email');
});

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::post('me', [AuthController::class, 'me']);
