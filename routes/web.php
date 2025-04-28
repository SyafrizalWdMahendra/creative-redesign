<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Public\ArticlePublicController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Public\ContactPublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Public\ServicePublicController;
use App\Http\Controllers\Admin\StudentWorkController;
use App\Http\Controllers\Public\StudentWorkPublicController;
use App\Http\Controllers\Admin\StudyController;
use App\Http\Controllers\Public\StudyPublicController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Public\TestimonyPublicController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// CRUD Frontend Page
Route::resource('/', HomeController::class);
Route::resource('/study', StudyPublicController::class);
Route::resource('/service', ServicePublicController::class);
Route::resource('/student_work', StudentWorkPublicController::class);
Route::resource('/testimony', TestimonyPublicController::class);
Route::resource('/article', ArticlePublicController::class);
Route::resource('/contact', ContactPublicController::class);
Route::get('/search/articles', [ArticlePublicController::class, 'search'])->name('search.articles');
Route::get('/search/services', [ServicePublicController::class, 'search'])->name('search.services');
Route::get('/search/studies', [StudyPublicController::class, 'search'])->name('search.studies');

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login-submit', [LoginController::class, 'login'])->name('login.submit');
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');

    // CRUD Admin Page
    Route::resource('admin/create/client_admin', ClientController::class);
    Route::resource('admin/create/team_admin', TeamController::class);
    Route::resource('admin/create/study_admin', StudyController::class);
    Route::resource('admin/create/service_admin', ServiceController::class);
    Route::resource('admin/create/student_work_admin', StudentWorkController::class);
    Route::resource('admin/create/testimony_admin', TestimonyController::class);
    Route::resource('admin/create/article_admin', ArticleController::class);
    Route::resource('admin/create/contact_admin', ContactController::class);

    // Searching Route
    Route::get('/search/client_admin', [ClientController::class, 'search'])->name('search.client_admin');
    Route::get('/search/team_admin', [TeamController::class, 'search'])->name('search.team_admin');
    Route::get('/search/study_admin', [StudyController::class, 'search'])->name('search.study_admin');
    Route::get('/search/service_admin', [ServiceController::class, 'search'])->name('search.service_admin');
    Route::get('/search/study_work_admin', [StudentWorkController::class, 'search'])->name('search.study_work_admin');
    Route::get('/search/testimony_admin', [TestimonyController::class, 'search'])->name('search.testimony_admin');
    Route::get('/search/article_admin', [ArticleController::class, 'search'])->name('search.article_admin');
    Route::get('/search/contact_admin', [ContactController::class, 'search'])->name('search.contact_admin');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
