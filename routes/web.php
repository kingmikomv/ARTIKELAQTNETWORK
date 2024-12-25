<?php

use App\Http\Controllers\DepanController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DepanController::class, 'index'])->name('depan.index');
