<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TecnologiaController;
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
Route::post('editar-presentacion', [InformationController::class, 'store'])->name('informacion.store');

Route::get('tecnologias', [TecnologiaController::class, 'index'])->name('tecnologias.index');
Route::delete('tecnologias/elimina', [TecnologiaController::class, 'delete'])->name('tecnologias.delete');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
Route::get('/imagenes/eliminar', [ImagenController::class, 'delete'])->name('imagenes.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
