<?php

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

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'dashboard'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*  Location route */
Route::get('/new/location', [App\Http\Controllers\LocationController::class, 'new'])->name('new.location');
Route::post('/store/location', [App\Http\Controllers\LocationController::class, 'store'])->name('store.location');

/*  Profile route */
Route::get('/accounts/list', [App\Http\Controllers\ProfileController::class, 'index'])->name('index.profile');
Route::get('/new/profile', [App\Http\Controllers\ProfileController::class, 'new'])->name('new.profile');
Route::post('/store/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('store.profile');
Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('show.profile');

/*  Reports route */
Route::get('/new/report', [App\Http\Controllers\ReportController::class, 'new'])->name('new.report');
Route::post('/store/report', [App\Http\Controllers\ReportController::class, 'store'])->name('store.report');
Route::get('report/{report}/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('edit.report');
Route::post('/search/reports', [App\Http\Controllers\ReportController::class, 'search'])->name('seach.report');
Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('index.report');
Route::patch('/report/{report}/update', [App\Http\Controllers\ReportController::class, 'update'])->name('update.report');
Route::get('/report/{report}/view', [App\Http\Controllers\ReportController::class, 'view'])->name('view.report');

/*  Employee route */
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('index.employee');
Route::get('/employee/{employee}/show', [App\Http\Controllers\EmployeeController::class, 'show'])->name('show.employee');
Route::get('/employee/new', [App\Http\Controllers\EmployeeController::class, 'new'])->name('new.employee');
Route::post('/store/employee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('store.employee');
Route::get('employee/{employee}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('edit.employee');
Route::patch('/employee/{employee}/update', [App\Http\Controllers\EmployeeController::class, 'update'])->name('update.employee');
Route::get('/employee/{employee}/destroy', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('destroy.employee');

/*  Email route */
Route::get('/email/compose', [App\Http\Controllers\EmailController::class, 'index'])->name('email.compose');
Route::get('/email/list', [App\Http\Controllers\EmailController::class, 'listEmails'])->name('email.list');
Route::get('/email/add-contact', [App\Http\Controllers\EmailController::class, 'addContact'])->name('email.addContact');
Route::post('/email/store', [App\Http\Controllers\EmailController::class, 'store'])->name('email.store');
Route::post('/email/import', [App\Http\Controllers\EmailController::class, 'importCSV'])->name('email.import');

//articles

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('article/delete/{id}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.delete');
Route::get('/articles/show/{id}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/edit/{id}', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
Route::post('/articles/update/{article}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
Route::get('/article/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
Route::post('/article/compose', [App\Http\Controllers\ArticleController::class, 'compose'])->name('articles.compose');
Route::get('/article/category', [App\Http\Controllers\ArticleCategory::class, 'index'])->name('article.category.index');
Route::post('/article/category/store', [App\Http\Controllers\ArticleCategory::class, 'store'])->name('articles.category.store');
Route::get('article/category/destroy/{id}', [App\Http\Controllers\ArticleCategory::class, 'destroy'])->name('article.category.destroy');

//Autthentication Path
Route::middleware('auth')->group(function () {
Route::get('/auth', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/store', [App\Http\Controllers\AuthController::class, 'store'])->name('auth.store');
Route::get('/auth/{auth}/edit', [App\Http\Controllers\AuthController::class, 'edit'])->name('auth.edit');
Route::patch('/auth/{auth}/update', [App\Http\Controllers\AuthController::class, 'update'])->name('auth.update');
Route::get('/auth/{auth}/destroy', [App\Http\Controllers\AuthController::class, 'destroy'])->name('auth.destroy');
});
