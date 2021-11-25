<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/buscar-requerimiento','requeriment.index');
Route::view('/nuevo-requerimiento','requeriment.create');
Route::view('/buscar-anulacion','anulation.index');
Route::view('/nueva-anulacion','anulation.create');
Route::view('/iniciar-sesion','login');
Route::view('/olvido-contrasena','password');
Route::view('/buscar-usuarios','user.index');
Route::view('/nuevo-usuario','user.create');
