<?php

use App\Http\Controllers\DepanController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DepanController::class, 'index'])->name('index');
Route::get('/artikel/{slug}', [DepanController::class, 'artikel'])->name('artikel');
Route::get('/kategori/{slug_tag}', [DepanController::class, 'kategori'])->name('kategori');
Route::get('{menu}/{submenu}', [DepanController::class, 'handle'])->name('sangmenu');
