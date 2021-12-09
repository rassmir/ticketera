<?php

use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequerimentController;
use App\Http\Controllers\AnulationController;


Route::get('logs', [LogViewerController::class, 'index']);

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
Route::post('/autenticacion', [UserController::class, 'authenticate'])->name('app.user.auth');
Route::get('/recuperar-contrasena', [UserController::class, 'forget'])->name('forget');

Route::group(['middleware' => ['role:administrador', 'auth']], function () {
    Route::get('/nuevo-usuario', [UserController::class, 'create'])->name('app.user.create');
});
//Usuarios
Route::group(['middleware' => ['auth']], function () {
    Route::get('/buscar-usuarios', [UserController::class, 'index'])->name('app.user.index');
    Route::post('/guardar-usuario', [UserController::class, 'store'])->name('app.user.save');
    Route::get('/ver-usuario/{id}', [UserController::class, 'show'])->name('app.user.show');
    Route::get('/editar-usuario/{id}', [UserController::class, 'edit'])->name('app.user.edit');
    Route::post('/actualizar-usuario/{id}', [UserController::class, 'update'])->name('app.user.update');
    Route::post('/eliminar-usuario/{id}', [UserController::class, 'destroy'])->name('app.user.destroy');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//Requerimientos
    //Sucursales
    Route::get('/sucursales/{idclinica}', [RequerimentController::class, 'branches'])->name('app.branches');
    //Centros Medicos
    Route::get('/centros-medicos/{idbranch}', [RequerimentController::class, 'centers'])->name('app.centers');
    //Unidades
    Route::get('/unidades/{idcenter}', [RequerimentController::class, 'units'])->name('app.units');
    //Profesionales
    Route::get('/profesionales/{idunit}', [RequerimentController::class, 'professionals'])->name('app.professionals');
    //Especialidades
    Route::get('/especialidades/{idprofessional}', [RequerimentController::class, 'especialities'])->name('app.especialities');

    Route::get('/buscar-requerimientos', [RequerimentController::class, 'index'])->name('app.requeriment.index');
    Route::get('/nuevo-requerimiento', [RequerimentController::class, 'create'])->name('app.requeriment.create');
    Route::post('/guardar-requerimiento', [RequerimentController::class, 'store'])->name('app.requeriment.store');
    Route::get('/ver-requerimiento/{id}', [RequerimentController::class, 'show'])->name('app.requeriment.show');
    Route::get('/editar-requerimiento/{id}', [RequerimentController::class, 'edit'])->name('app.requeriment.edit');
    Route::post('/actualizar-requerimiento/{id}', [RequerimentController::class, 'update'])->name('app.requeriment.update');
    Route::post('/eliminar-requerimiento/{id}', [RequerimentController::class, 'destroy'])->name('app.requeriment.destroy');

//Anulaciones
    Route::get('/buscar-anulaciones', [AnulationController::class, 'index'])->name('app.anulation.index');
    Route::get('/crear-anulacion', [AnulationController::class, 'create'])->name('app.anulation.create');
});
