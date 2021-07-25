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
Route::post('/store/attendance', [App\Http\Controllers\AttendanceController::class, 'store'])->name('store.attendance');

Route::get('/reports/{attendance}', [App\Http\Controllers\ReportController::class, 'index'])->name('index.report');

/*  Email route */
Route::get('/compose/email', [App\Http\Controllers\EmailController::class, 'index'])->name('email');

