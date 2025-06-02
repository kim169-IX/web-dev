<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private $genres = null;

    public function __construct()
    {
        $this->genres = collect(Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'])
            ->mapWithKeys(function ($genre) {
                return [$genre['id'] => $genre['name']];
            });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json();

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing') 
            ->json();

        $upcomingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json();

        $popularMovies['results'] = collect($popularMovies['results'])->map(function($movie) {
            $movie['genre_names'] = collect($movie['genre_ids'])->map(function($id) {
                return $this->genres->get($id);
            })->implode(', ');
            return $movie;
        });

        $upcomingMovies['results'] = collect($upcomingMovies['results'])->map(function($movie) {
            $movie['genre_names'] = collect($movie['genre_ids'])->map(function($id) {
                return $this->genres->get($id);
            })->implode(', ');
            return $movie;
        });

        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies,
            'genres' => $this->genres, 
        ]);
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
   

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
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        // Format genres into a string
        $genreNames = collect($movie['genres'])->pluck('name')->implode(', ');
        
        // Add genre_names to movie array
        $movie['genre_names'] = $genreNames;

        $movie['cast'] = collect($movie['credits']['cast'])->take(5); 

        $movie['images'] = collect($movie['images']['backdrops'])->take(9);

        return view('movies.show', [ 
            'movie' => $movie
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
