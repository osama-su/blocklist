<?php

use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\PendingRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredCompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('registered-companies', [RegisteredCompanyController::class, 'index'])
        ->name('registered-companies');
    Route::get('registered-companies/{id}', [RegisteredCompanyController::class, 'show'])
        ->name('registered-companies.show');
    Route::get('registered-companies/{id}/delete', [RegisteredCompanyController::class, 'destroy'])
        ->name('registered-companies.destroy');

    Route::get('pending-requests', [PendingRequestController::class, 'index'])
        ->name('pending-requests');
    Route::get('pending-requests/{user}', [PendingRequestController::class, 'approve'])
        ->name('pending-requests.approve');

    Route::get('blacklist', [BlacklistController::class, 'index'])->name('blacklist');
    Route::get('blacklist/{id}', [BlacklistController::class, 'rmeove'])
        ->name('blacklist.remove');
});

require __DIR__.'/auth.php';
