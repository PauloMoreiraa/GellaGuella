<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatternController; // -> Views and normal page
use App\Http\Controllers\AuthController; // -> Admin's Auth
use App\Http\Controllers\DatabaseController; // -> Branches's Crud
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\emailContact;

// User

Route::get('/', [PatternController::class, 'homeView'])->name('home');
Route::get('/home', [PatternController::class, 'homeView'])->name('home');;
Route::get('/sobre', [PatternController::class, 'aboutView'])->name('about');;
Route::get('/filiais', [PatternController::class, 'branchesView'])->name('branches');
Route::get('/contato', [PatternController::class, 'contactView'])->name('contact');;

// Adm - Auth

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Adm - Dashboard

Route::get('/adm', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('add', [AuthController::class, 'addView']);
Route::post('add', [DatabaseController::class, 'add']);

Route::post('model/{id}', [DatabaseController::class, 'update']);

Route::get('model/{id}', [AuthController::class, 'modelView'])->name('model');
Route::get('model/image/{id}', [DatabaseController::class, 'deleteImage'])->name('deleteImage');
Route::get('model/branch/{id}', [DatabaseController::class, 'deleteBranch'])->name('deleteBranch');

Route::post('model/{id}', [DatabaseController::class, 'addImage'])->name('addImage');

// Contact - Send Email

Route::post('contact/sendEmail', [emailContact::class, 'send'])->name('sendEmail.contact');

// Ninguém tira essas rotas abaixo...

// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();