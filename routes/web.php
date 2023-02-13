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

    Route::post('/enviament/state/update/{id}', [App\Http\Controllers\HomeController::class, 'udpateState'])->name('udpateState');
    Route::get('/send/mail/{id}', [App\Http\Controllers\HomeController::class, 'sendEmail'])->name('sendEmail');


    Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index'])->name('empresa');

    //STUDENTS
    Route::post('/students/delete/{id}',[\App\Http\Controllers\AlumnesController::class, 'deleteAlumne'])->name('deleteAlumne');
    Route::post('/students/update/{id}',[\App\Http\Controllers\AlumnesController::class, 'updateAlumnes'])->name('updateAlumnes');
    //Route::post('/students/update/CV/{id}',[\App\Http\Controllers\AlumnesController::class, 'UdpdateCV'])->name('UdpdateCV');
    Route::post('/students/curriculum/download/{id}',[\App\Http\Controllers\AlumnesController::class, 'ViewCV'])->name('ViewCV');

    Route::get('/getAllAlumnes',[InjectionController::class,'getAllAlumnes']);
    Route::get('/getAllEnviaments',[InjectionController::class,'getAllEnviaments']);
    Route::get('/getAllEstudis',[InjectionController::class,'getAllEstudis']);
    Route::get('/getAllEmpresas',[InjectionController::class,'getAllEmpresas']);
    Route::get('/getAllOfertas',[InjectionController::class,'getAllOfertas']);
    Route::get('/getAllUsers',[InjectionController::class,'getAllUsers']);
    Route::get('/students', [\App\Http\Controllers\AlumnesController::class, 'index'])->name('students');
    Route::post('/students/add', [\App\Http\Controllers\AlumnesController::class, 'addStudent'])->name('addStudents');

    Route::post('/fitxa/{id}', [App\Http\Controllers\UserController::class, 'fitxa'])->name('fitxa');
    Route::post('/users/delete/{id}',[\App\Http\Controllers\UserController::class, 'deleteUser'])->name('userDelete');


    Route::get('/studies', [\App\Http\Controllers\EstudisController::class, 'index'])->name('estudis');
    Route::get('/oferta/tutor', [\App\Http\Controllers\TutorController::class, 'index'])->name('tutor');
    Route::post('/oferta/tutor/{id}', [\App\Http\Controllers\TutorController::class, 'sendOffer'])->name('sendOffer');
    Route::get('/oferta/tutor/filter-by-year', [\App\Http\Controllers\TutorController::class, 'filterByYear'])->name('filter-by-year');
    Route::get('/oferta/tutor/filter-by-vacancies', [\App\Http\Controllers\TutorController::class, 'filterByVacancies'])->name('filter-by-vacancies');



});

Route::middleware(["auth", "coordinator.routes"])->group(function (){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');

    Route::get('/empresa/oferta',[OfertaController::class,'index'])->name('oferta');
    Route::post('/empresa/oferta/add/{idempresa}',[OfertaController::class,'addNewCompany']);
    Route::get('/empresa/oferta/delete/{id}',[OfertaController::class,'deleteOffer'])->name('deleteOffer');
    Route::post('/empresa/oferta/update/{id}',[OfertaController::class,'updateOferta'])->name('updateOferta');
    Route::post('/empresa/oferta/add',[OfertaController::class,'addOferta'])->name('addOferta');

    Route::get('/empresa/add/{nom}/{adreça}/{telefon}/{correu}',[EmpresaController::class,'addEmpresaURL']);
    Route::get('/empresa/edit/{id}/{nom}/{adreça}/{telefon}/{correu}',[EmpresaController::class, 'setEmpresa']);

    Route::post('/empresa/update/{id}',[EmpresaController::class, 'editEmpresa'])->name('editEmpresa');
    Route::post('/empresa/insert',[EmpresaController::class, 'addEmpresa'])->name('addEmpresa');
    Route::post('/empresa/delete/{id}',[EmpresaController::class, 'deleteEmpresa'])->name('deleteEmpresa');

});

