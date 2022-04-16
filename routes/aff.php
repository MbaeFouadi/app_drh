<?php

use App\Http\Controllers\affectationsController;
use Illuminate\Support\Facades\Route;

Route::get('/affectations',[affectationsController::class,'index']);
Route::get('/affectations',[affectationsController::class,'create']);
Route::get('/affectations',[affectationsController::class,'show']);
Route::post('/affectations',[affectationsControllerr::class,'corps']);
Route::post('/affectations',[affectationsController::class,'echelons']);
Route::get('/affectations',[affectationsController::class,'indices']);
Route::get('/affectations',[affectationsController::class,'classes']);
