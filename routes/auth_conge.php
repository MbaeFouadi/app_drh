<?php

use App\Http\Controllers\Conges\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Conges\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Conges\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Conges\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Conges\Auth\NewPasswordController;
use App\Http\Controllers\Conges\Auth\PasswordResetLinkController;
use App\Http\Controllers\Conges\Auth\RegisteredUserController;
use App\Http\Controllers\Conges\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/conges/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('conges.register');

Route::post('/conges/utilisateur', [RegisteredUserController::class, 'store'])
                ->middleware('auth')
                ->name('conges.inscription');
Route::get('/conges/utilisateur', [RegisteredUserController::class, 'index'])
                            ->middleware('auth')
                            ->name('conges.utilisateur');                

Route::get('/conges', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('/conges');

Route::post('/conges/accueil', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('conges.accueil');

Route::get('/conges/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('conges.password.request');

Route::post('/conges/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('conges.password.email');

Route::get('/conges/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('conges.password.reset');

Route::post('/conges/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('conges.password.update');

Route::get('/conges/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('conges.verification.notice');

Route::get('/conges/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('conges.verification.verify');

Route::post('/conges/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('conges.verification.send');

Route::get('/conges/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('conges.password.confirm');

Route::post('/conges/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::get('/conges/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('conges.logout');
