<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
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

Route::get('/', PortafolioController::class);

Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyecto.index');
Route::get('/proyectos/crear', [ProyectoController::class, 'create'])->name('proyecto.store');
Route::get('/proyectos/editar/{proyecto:titulo}', [ProyectoController::class, 'show'])->name('proyecto.form');
Route::patch('/proyectos/editar/{proyecto:titulo}', [ProyectoController::class, 'update'])->name('proyecto.update');

Route::get('editar-presentacion', [InformationController::class, 'edit'])->name('informacion.edit');
Route::patch('editar-presentacion', [InformationController::class, 'edit']);

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
