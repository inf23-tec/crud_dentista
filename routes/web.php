<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
Route::post('/citas', [CitasController::class, 'crear'])->name('citas.crear');
Route::delete('/citas/{id}', [CitasController::class, 'eliminar'])->name('citas.eliminar');


// Route::get('/citas', function () {
//     return view('citas.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
