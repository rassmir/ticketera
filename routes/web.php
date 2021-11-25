<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequerimentController;
use App\Http\Controllers\AnulationController;
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('/recuperar-contrasena', [UserController::class, 'forget'])->name('forget');

//Usuarios
Route::get('/buscar-usuarios', [UserController::class, 'index'])->name('app.user.index');
Route::get('/nuevo-usuario', [UserController::class, 'create'])->name('app.user.create');

//Requerimientos
Route::get('/buscar-requerimientos', [RequerimentController::class, 'index'])->name('app.requeriment.index');
Route::get('/nuevo-requerimiento', [RequerimentController::class, 'create'])->name('app.requeriment.create');

//Anulaciones
Route::get('/buscar-anulaciones', [AnulationController::class, 'index'])->name('app.anulation.index');
Route::get('/crear-anulacion', [AnulationController::class, 'create'])->name('app.anulation.create');


