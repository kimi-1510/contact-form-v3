<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/detail/{id}', [AdminController::class, 'detail'])->name('admin.detail');
Route::post('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
