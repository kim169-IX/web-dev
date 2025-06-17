@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold mb-6">
            {{ $genre['name'] }} Movies
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($movies as $movie)
                <div class="mt-8">
                    <a href="{{ route('movies.show', $movie['id']) }}" aria-label="View details for {{ $movie['title'] }}">
                        <img 
                            src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" 
                            alt="Poster of {{ $movie['title'] }}" 
                            class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg shadow-md"
                            loading="lazy"
                        >
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('movies.show', $movie['id']) }}" 
                           class="text-lg mt-2 hover:text-gray-300 block font-semibold"
                           title="{{ $movie['title'] }}">
                            {{ $movie['title'] }}
                        </a>
                        <div class="flex items-center text-gray-400 text-sm mt-1 space-x-2">
                            <div class="flex items-center">
                                <svg class="fill-current text-orange-500 w-4 h-4" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                    <g data-name="Layer 2">
                                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"/>
                                    </g>
                                </svg>
                                <span class="ml-1">{{ number_format($movie['vote_average'] * 10, 0) . '%' }}</span>
                            </div>
                            <span aria-hidden="true">|</span>
                            <time datetime="{{ $movie['release_date'] }}">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</time>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
