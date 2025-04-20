<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\StudyWorkController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/admin/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/admin/study', [StudyController::class, 'index'])->name('study.index');
Route::get('/admin/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/admin/study-work', [StudyWorkController::class, 'index'])->name('study-work.index');
Route::get('/admin/testimony', [TestimonyController::class, 'index'])->name('testimony.index');
Route::get('/admin/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');

