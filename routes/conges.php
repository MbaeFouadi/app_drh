<?php

use App\Http\Controllers\composantesController;
use App\Http\Controllers\Conges\CongesController;
use App\Http\Controllers\fonctionController;
use App\Http\Controllers\serviceController;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/conges', [CongesController::class,'index'])->name('conges');

Route::get('/demande_conges', function () {
    return view('pages.conges.demande');
})->name('demande_conges');

Route::get('/messanger', function () {
    return view('pages.conges.messanger');
})->name('messanger');


// Route::post('/connexion',[CongesController::class, 'connexion'])->name('connexion');
Route::resource('/conges',CongesController::class)->middleware(['auth']);
Route::get('/edit/{id}/{im}',[CongesController::class, 'edit'])->name('congesedit');

// SUPPRESSION ET EDITION 
Route::post('/edit_composante',[composantesController::class, 'update'])->name('edit_composante');
Route::post('/delete_composante',[composantesController::class, 'destroy'])->name('delete_composante');

Route::post('/edit_service',[serviceController::class, 'update'])->name('edit_service');
Route::post('/delete_service',[serviceController::class, 'destroy'])->name('delete_service');

//Route::post('/form_edit_fonction',[fonctionController::class, 'update'])->name('edit_fonction');
Route::post('/delete_fonction',[fonctionController::class, 'destroy'])->name('delete_fonction');


Route::post('/form_edit_fonction', function () {
    dd('azeza');
})->name('form_edit_fonction');