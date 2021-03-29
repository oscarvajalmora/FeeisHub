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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('enviar-feedback', [App\Http\Controllers\ReviewController::class, 'create'])->name('send-review.form');
Route::get('ver/{slug}', [App\Http\Controllers\ReviewController::class, 'show'])->name('reported.details');
Route::get('ayuda', [App\Http\Controllers\FaqController::class, 'index'])->name('page.help');

// Internal use
Route::post('/send-review', [App\Http\Controllers\ReviewController::class, 'store'])->name('send-review.store');
Route::post('/search-review', [App\Http\Controllers\HomeController::class, 'searchProfile'])->name('search-reviews');