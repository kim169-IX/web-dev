<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieListController;  // Add this line


Route::get('/', [MovieController::class, 'index'])->name('movies.index'); 
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show'); // Changed from /movie to /movies 

Route::get('movielist', [MovieListController::class, 'index'])->name('movielist.index'); 
Route::get('/movielist/{movielist}', [MovieListController::class, 'show'])->name('movielist.show'); // Changed from /movie to /movies

// Route::view('/','index'); 
// Route::view('/movie','show'); 


