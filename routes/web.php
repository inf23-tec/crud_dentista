<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');
Route::delete('/paciente/{id}', [PacienteController::class, 'eliminar'])->name('paciente.eliminar');
Route::post('/paciente/crear', [PacienteController::class, 'crearIndex'])->name('paciente.crear.index');
Route::post('/paciente', [PacienteController::class, 'crear'])->name('paciente.crear');

Route::post('/paciente/editar/{id}', [PacienteController::class, 'editar'])->name('paciente.editar.index');
Route::post('/paciente/actualizar/{id}', [PacienteController::class, 'actualizar'])->name('paciente.actualizar');


Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
Route::delete('/citas/delete/{id}', [CitasController::class, 'eliminar'])->name('citas.eliminar');

Route::post('/citas/almacenar/{id}', [CitasController::class, 'almacenar'])->name('citas.almacenar');
Route::get('/citas/crear', [CitasController::class, 'crear'])->name('citas.crear');











Route::get('/', function () {
    return auth() ? redirect('/dashboard') : redirect('/login');

})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [CitasController::class, 'index'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
