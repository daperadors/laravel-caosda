<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\InjectionController;
use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(["auth"])->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');
    Route::get('/empresa/oferta',[OfertaController::class,'index'])->name('oferta');
    Route::get('/empresa/oferta/add/{idempresa}',[OfertaController::class,'addNewCompany']);

    Route::get('/empresa/add/{nom}/{adreça}/{telefon}/{correu}',[EmpresaController::class,'addEmpresaURL']);
    Route::get('/empresa/edit/{id}/{nom}/{adreça}/{telefon}/{correu}',[EmpresaController::class, 'setEmpresa']);

    Route::post('/empresa/update/{id}',[EmpresaController::class, 'editEmpresa'])->name('editEmpresa');
    Route::post('/empresa/insert',[EmpresaController::class, 'addEmpresa'])->name('addEmpresa');
    Route::post('/empresa/delete/{id}',[EmpresaController::class, 'deleteEmpresa'])->name('deleteEmpresa');

    Route::get('/getAllAlumnes',[InjectionController::class,'getAllAlumnes']);
    Route::get('/getAllEnviaments',[InjectionController::class,'getAllEnviaments']);
    Route::get('/getAllEstudis',[InjectionController::class,'getAllEstudis']);
    Route::get('/getAllEmpresas',[InjectionController::class,'getAllEmpresas']);
    Route::get('/getAllOfertas',[InjectionController::class,'getAllOfertas']);
    Route::get('/getAllUsers',[InjectionController::class,'getAllUsers']);
    Route::get('/students', [\App\Http\Controllers\AlumnesController::class, 'index'])->name('students');
});

Route::middleware(["auth", "coordinator.routes"])->group(function (){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
});

