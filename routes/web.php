<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index'])->name('movies.index'); 
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show'); // Changed from /movie to /movies

// Route::view('/','index'); 
// Route::view('/movie','show'); 


