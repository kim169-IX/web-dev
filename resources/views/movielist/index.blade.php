@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-4">
    <div class="movie-genres">
        <h2 class="uppercase tracking-tight text-orange-400 text-xl font-medium mb-6">Movie Categories</h2>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($genres as $genre)
                <div class="genre-card bg-gray-800 rounded-lg p-4 text-center hover:bg-orange-500 transition duration-300">
                    <a href="{{ route('movielist.show', $genre['id']) }}" class="text-gray-200 hover:text-white text-sm font-medium">
                        {{ $genre['name'] }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection