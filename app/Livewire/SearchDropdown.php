<?php

namespace App\Livewire;  // This is correct for Livewire v3

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

#[\Livewire\Attributes\Layout('layouts.main')]  // Add this attribute
class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];
    public $yearFilter = '';
    public $genreFilter = '';
    public $sortBy = 'popularity.desc';
    public $genres = [];

    public function boot()
    {
        Log::info('Component booted'); // Debug line
    }

    public function mount()
    {
        $this->loadGenres();
    }

    protected function loadGenres()
    {
        try {
            $response = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list');

            if ($response->successful()) {
                $this->genres = $response->json()['genres'];
            }
        } catch (\Exception $e) {
            Log::error('TMDB Genres Error: ' . $e->getMessage());
        }
    }

    public function updatedSearch($value)
    {
        Log::info('Search updated: ' . $value); // Debug line
        $this->searchResults = [];
        
        if (strlen($value) >= 2) {
            try {
                $params = [
                    'query' => $value,
                    'language' => 'en-US',
                    'include_adult' => false,
                    'page' => 1,
                    'sort_by' => $this->sortBy,
                ];

                if ($this->yearFilter) {
                    $params['year'] = $this->yearFilter;
                }

                if ($this->genreFilter) {
                    $params['with_genres'] = $this->genreFilter;
                }

                $response = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/search/movie', $params);

                if ($response->successful()) {
                    $this->searchResults = $response->collect('results')
                        ->take(7)
                        ->toArray();
                    Log::info('Results found: ' . count($this->searchResults)); // Debug line
                }
            } catch (\Exception $e) {
                Log::error('TMDB Search Error: ' . $e->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }


}   