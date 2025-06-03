<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $this->searchResults = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
                ->json()['results']; 
        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}