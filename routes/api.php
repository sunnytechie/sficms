<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can r   egister API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries',  [App\Http\Controllers\Api\EmailApiController::class, 'country'])->name('countries');
Route::get('/states',  [App\Http\Controllers\Api\EmailApiController::class, 'state'])->name('states');
Route::get('/areas',  [App\Http\Controllers\Api\EmailApiController::class, 'area'])->name('areas');
Route::get('/chapters',  [App\Http\Controllers\Api\EmailApiController::class, 'chapter'])->name('chapters');
Route::get('/categories',  [App\Http\Controllers\Api\EmailApiController::class, 'category'])->name('categories');
Route::get('/contacts',  [App\Http\Controllers\Api\EmailApiController::class, 'allContact'])->name('contacts');


// a higly super sensitive aspect of this app
Route::get('/details/{item}/{tableName}',  [App\Http\Controllers\Api\EmailApiController::class, 'show'])->name('show');


Route::post('/send-mail',  [App\Http\Controllers\Api\EmailApiController::class, 'store'])->name('store');
