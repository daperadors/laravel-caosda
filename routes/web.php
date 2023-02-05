<?php

use App\Http\Controllers\InjectionController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');

Route::get('/getAllAlumnes',[InjectionController::class,'getAllAlumnes']);
Route::get('/getAllEnviaments',[InjectionController::class,'getAllEnviaments']);
Route::get('/getAllEstudis',[InjectionController::class,'getAllEstudis']);
Route::get('/getAllEmpresas',[InjectionController::class,'getAllEmpresas']);
Route::get('/getAllOfertas',[InjectionController::class,'getAllOfertas']);
Route::get('/getAllUsers',[InjectionController::class,'getAllUsers']);
