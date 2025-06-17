<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        return view('movielist.index', [
            'genres' => $genres
        ]);
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Get genre details
        $genreResponse = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json();

        $genre = collect($genreResponse['genres'])->firstWhere('id', (int)$id);

        // Get movies filtered by genre
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie', [
                'query' => [
                    'with_genres' => $id,
                    'sort_by' => 'popularity.desc',
                    'page' => 1,
                    'vote_count.gte' => 100
                ]
            ])
            ->json()['results'];

        return view('movielist.show', [
            'genre' => $genre,
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
