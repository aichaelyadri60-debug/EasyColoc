<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/colocation', [ColocationController::class, 'index'])->name('colocation.index');
    Route::get('colocation/{colocation}/show', [ColocationController::class, 'show'])->name('colocation.show');
    Route::get('/colocation/create', [ColocationController::class, 'create'])->name('colocation.create');
    Route::post('/colocation', [ColocationController::class, 'store'])->name('colocation.store');
    Route::get('colocation/{colocation}/edit', [ColocationController::class, 'edit'])->name('colocation.edit');
    Route::put('colocation/{colocation}', [ColocationController::class, 'update'])->name('colocation.update');
    Route::delete('colocation/{colocation}', [ColocationController::class, 'destroy'])->name('colocation.destroy');
    Route::post('annulercolocation/{colocation}', [ColocationController::class, 'annulercolocation'])->name('annulercolocation');
});


Route::post('/addMembre/{colocation}',[UserController::class, 'addMembre'])->name('addMembre');
require __DIR__ . '/auth.php';
