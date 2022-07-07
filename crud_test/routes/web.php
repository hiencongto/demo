<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/add', [CategoryController::class, 'viewAdd']);
Route::post('/add', [CategoryController::class, 'create']);
Route::get('/list', [CategoryController::class, 'list'])->name('list');
Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [CategoryController::class, 'show'])->name('show');
Route::post('/edit/{id}', [CategoryController::class, 'update']);
