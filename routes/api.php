<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BlacklistController;
use App\Http\Controllers\Api\ProfileController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [ProfileController::class, 'index']);
    Route::put('profile', [ProfileController::class, 'update']);
});

Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'blacklist'
], function ($router) {
    Route::get('/', [BlacklistController::class, 'index']);
    Route::get('/all', [BlacklistController::class, 'all']);
    Route::post('/', [BlacklistController::class, 'store']);
    Route::get('/{blacklist}', [BlacklistController::class, 'show']);
    Route::put('/{blacklist}', [BlacklistController::class, 'update']);
    Route::delete('/{blacklist}', [BlacklistController::class, 'destroy']);
});



