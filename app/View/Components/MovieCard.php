<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MovieCard extends Component
{
    public $movie;
    public $genres;

    public function __construct($movie, $genres = []) 
    {
        $this->movie = $movie;
        $this->genres = $genres;
    }

    public function genreNames()
    {
        if (empty($this->genres)) {
            return '';
        }
        
        return collect($this->genres)
            ->pluck('name')
            ->implode(', ');
    }

    public function render(): View|Closure|string
    {
        return view('components.movie-card');
    } 
}
