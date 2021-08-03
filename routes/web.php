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

Route::get('/new/location', [App\Http\Controllers\LocationController::class, 'new'])->name('new.location');
Route::post('/store/location', [App\Http\Controllers\LocationController::class, 'store'])->name('store.location');

Route::get('/accounts/list', [App\Http\Controllers\ProfileController::class, 'index'])->name('index.profile');
Route::get('/new/profile', [App\Http\Controllers\ProfileController::class, 'new'])->name('new.profile');
Route::post('/store/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('store.profile');
Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('show.profile');

Route::get('/index/attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('index.attendance');
Route::get('/new/attendance', [App\Http\Controllers\AttendanceController::class, 'new'])->name('new.attendance');

Route::get('/new/report', [App\Http\Controllers\ReportController::class, 'new'])->name('new.report');
Route::post('/store/report', [App\Http\Controllers\ReportController::class, 'store'])->name('store.report');
Route::get('report/{report}/edit', [App\Http\Controllers\ReportController::class, 'edit'])->name('edit.report');
Route::post('/search/reports', [App\Http\Controllers\ReportController::class, 'search'])->name('seach.report');
Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('index.report');
Route::patch('/report/{report}/update', [App\Http\Controllers\ReportController::class, 'update'])->name('update.report');
Route::get('/report/{report}/view', [App\Http\Controllers\ReportController::class, 'view'])->name('view.report');

/*  Email route */
Route::get('/email/compose', [App\Http\Controllers\EmailController::class, 'index'])->name('email.compose');

Route::get('/email/list', [App\Http\Controllers\EmailController::class, 'listEmails'])->name('email.list');

Route::get('/email/add-contact', [App\Http\Controllers\EmailController::class, 'addContact'])->name('email.addContact');

Route::post('/email/store', [App\Http\Controllers\EmailController::class, 'store'])->name('email.store');
Route::post('/email/import', [App\Http\Controllers\EmailController::class, 'importCSV'])->name('email.import');
