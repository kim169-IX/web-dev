<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieListController extends Controller
{
    /**
     * Display a listing of the resource (all genres).
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
     * Display the specified resource (movies by genre).
     */
    public function show(string $id)
    {
        // Get genre details
        $genreResponse = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json();

        $genre = collect($genreResponse['genres'])->firstWhere('id', (int)$id);

        if (!$genre) {
            abort(404, 'Genre not found');
        }

        // Get movies filtered by genre
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie', [
                'with_genres' => $id,
                'sort_by' => 'popularity.desc',
                'page' => 1,
                'vote_count.gte' => 100
            ])
            ->json()['results'];

        return view('movielist.show', [
            'genre' => $genre,
            'movies' => $movies
        ]);
    }

    // Other resource methods left empty since unused

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
