<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticlePublicController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePublicController;
use App\Http\Controllers\StudentWorkController;
use App\Http\Controllers\StudentWorkPublicController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\StudyPublicController;
use App\Http\Controllers\StudyWorkController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TestimonyPublicController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/admin/home', [HomeController::class, 'index'])->name('home.index');

// CRUD Admin Page
Route::resource('admin/create/client', ClientController::class);
Route::resource('admin/create/team', TeamController::class);
Route::resource('admin/create/study', StudyController::class);
Route::resource('admin/create/service', ServiceController::class);
Route::resource('admin/create/student_work', StudentWorkController::class);
Route::resource('admin/create/testimony', TestimonyController::class);
Route::resource('admin/create/article', ArticleController::class);
Route::resource('admin/create/contact', ContactController::class);

// CRUD Frontend Page
Route::resource('/', HomeController::class);
Route::resource('/study', StudyPublicController::class);
Route::resource('/service', ServicePublicController::class);
Route::resource('/student_work', StudentWorkPublicController::class);
Route::resource('/testimony', TestimonyPublicController::class);
Route::resource('/article', ArticlePublicController::class);
Route::resource('/contact', ContactPublicController::class);
