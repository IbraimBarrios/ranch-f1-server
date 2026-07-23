<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::resource('users', UserController::class);
    Route::prefix('users/{user}/profile')->group(function () {
        Route::get('/', [UserProfileController::class, 'show'])->name('profile.show');
        Route::get('/create', [UserProfileController::class, 'create'])->name('profile.create');
        Route::post('/', [UserProfileController::class, 'store'])->name('profile.store');
        Route::get('/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [UserProfileController::class, 'update'])->name('profile.update');
    });
    
    Route::resource('roles', RoleController::class);

});

require __DIR__.'/auth.php';
