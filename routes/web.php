<?php

use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequerimentController;
use App\Http\Controllers\AnulationController;
use App\Http\Controllers\ResetPasswordController;


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
Route::get('/recuperar-contrasena', [ResetPasswordController::class, 'index'])->name('forget');
Route::post('/recuperar-contrasena', [ResetPasswordController::class, 'validateToResetPassword'])->name('validate-reset-password');
Route::get('token-password/{token}', [ResetPasswordController::class, 'formEmailPasswordWithToken'])->name('show.after.reset');
Route::post('/enviar-resetear-contrasena', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('submit-reset-password');


Route::group(['middleware' => ['role:administrador', 'auth']], function () {
    Route::get('/nuevo-usuario', [UserController::class, 'create'])->name('app.user.create');
    Route::get('/buscar-usuarios', [UserController::class, 'index'])->name('app.user.index');
    Route::post('/guardar-usuario', [UserController::class, 'store'])->name('app.user.save');
    Route::get('/ver-usuario/{id}', [UserController::class, 'show'])->name('app.user.show');
    Route::get('/editar-usuario/{id}', [UserController::class, 'edit'])->name('app.user.edit');
    Route::post('/actualizar-usuario/{id}', [UserController::class, 'update'])->name('app.user.update');
    Route::post('/eliminar-usuario/{id}', [UserController::class, 'destroy'])->name('app.user.destroy');
    Route::get('/descargar-plantilla-usuario', [UserController::class, 'downloadPlantilla'])->name('app.user.excel-download');
    Route::post('/importar-usuario', [UserController::class, 'importuser'])->name('app.user.import');
});

//Usuarios
Route::group(['middleware' => ['auth']], function () {
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

    //Sla profesional
    Route::get('/sla/{id}', [RequerimentController::class, 'getSlaByProffesional'])->name('app.sla');

    //Graficos
    Route::get('/grafico1', [RequerimentController::class, 'grafic1'])->name('app.grafic1');
    Route::get('/grafico2', [RequerimentController::class, 'grafic2'])->name('app.grafic2');
    Route::get('/grafico3', [RequerimentController::class, 'grafic3'])->name('app.grafic3');
    Route::get('/grafico4', [RequerimentController::class, 'grafic4'])->name('app.grafic4');

    Route::get('/dashboard-requerimientos', [RequerimentController::class, 'dashboard'])->name('app.dashboard');
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
    Route::post('/guardar-anulacion', [AnulationController::class, 'store'])->name('app.anulation.store');
    Route::get('/ver-anulacion/{id}', [AnulationController::class, 'show'])->name('app.anulation.show');
    Route::get('/editar-anulacion/{id}', [AnulationController::class, 'edit'])->name('app.anulation.edit');
    Route::post('/actualizar-anulacion/{id}', [AnulationController::class, 'update'])->name('app.anulation.update');


    Route::get('/subir-excel/{ticket}', [AnulationController::class, 'excel'])->name('app.anulation.excel');
    Route::post('/guardar-excel', [AnulationController::class, 'importexcel'])->name('app.anulation.import.excel');
    Route::get('/detalle-anulacion', [AnulationController::class, 'detailAnulation'])->name('app.anulation.detailanulation');
    Route::get('/ver-detalle-anulacion/{id}', [AnulationController::class, 'showDetailAnulation'])->name('app.anulation.show.detailanulation');
    Route::get('/editar-detalle-anulacion/{id}', [AnulationController::class, 'editDetailAnulation'])->name('app.anulation.edit.detailanulation');
    Route::post('/actualizar-detalle-anulacion/{id}', [AnulationController::class, 'updateDetailAnulation'])->name('app.anulation.update.detailanulation');
    Route::post('/eliminar-detalle-anulacion/{id}', [AnulationController::class, 'destroyDetailAnulation'])->name('app.anulation.delete.detailanulation');

    Route::get('/consultar-ticket/{idticket}', [AnulationController::class, 'consultingDetailTicketByID'])->name('app.consulting-ticket');
    Route::get('/enviar-correos/{idticket}', [AnulationController::class, 'sendEmailTicketByID'])->name('app.sending-email');

});

Route::view('editar-detalle-anulacion','anulation.edit-detail-anulation');
Route::view('correo','email.correo');
