<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private $genres;

    public function __construct()
    {
        $this->genres = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'])
            ->mapWithKeys(fn($genre) => [$genre['id'] => $genre['name']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = $this->fetchAndFormatMovies('movie/popular');
        $upcomingMovies = $this->fetchAndFormatMovies('movie/upcoming');

        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies,
            'genres' => $this->genres,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/movie/{$id}?append_to_response=credits,videos,images")
            ->json();

        $movie['genre_names'] = collect($movie['genres'])->pluck('name')->implode(', ');
        $movie['cast'] = collect($movie['credits']['cast'])->take(5);
        $movie['images'] = collect($movie['images']['backdrops'])->take(9);

        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    /**
     * Fetch movies from TMDB and map genre names.
     */
    private function fetchAndFormatMovies(string $endpoint)
    {
        $response = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/{$endpoint}")
            ->json();

        $response['results'] = collect($response['results'])->map(function ($movie) {
            $movie['genre_names'] = collect($movie['genre_ids'])
                ->map(fn($id) => $this->genres->get($id))
                ->implode(', ');
            return $movie;
        });

        return $response;
    }
}
