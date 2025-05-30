<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index'); 
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movies.show');

// Route::view('/','index'); 
// Route::view('/movie','show');


