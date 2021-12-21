<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjekWisataController;

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

Route::get('/', [ObjekWisataController::class, 'show'])->name('show');
Route::get('/kategori/{kategori}', [ObjekWisataController::class, 'category']);
Route::post('/store', [ObjekWisataController::class, 'store'])->name('store');
Route::post('/search', [ObjekWisataController::class, 'search'])->name('search');