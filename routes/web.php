<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user', function () {
    return view('user-profile');
})->middleware(['auth', 'verified'])->name('user');

Route::get('/table', function () {
    return view('table');
})->middleware(['auth', 'verified'])->name('table');

Route::get('/typog', function () {
    return view('typog');
})->middleware(['auth', 'verified'])->name('typog');

Route::get('/icons', function () {
    return view('icons');
})->middleware(['auth', 'verified'])->name('icons');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
