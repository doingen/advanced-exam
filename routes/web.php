<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/manage', [ContactController::class, 'search'])->name('contact.search');
Route::get('/contact/manage/result', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact/manage', [ContactController::class, 'delete'])->name('contact.delete');
