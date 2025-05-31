@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-4">
  <div class="Popular-Movies">
    <h2 class="uppercase tracking-tight text-orange-400 text-xl font-medium">Movie Discovery</h2>

    <!-- Card section  -->

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3">
      @foreach($popularMovies['results'] as $movie)
      <div class="mt-8">
        <a href="#">
          <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}"
            alt="{{ $movie['title'] }}"
            class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
        </a>
        <div class="mt-2">
          <a href="#" class="text-lg font-medium hover:text-gray-300">{{ $movie['title'] }}</a>
          <div class="flex items-center text-gray-600 mt-1">
            <img src="{{ asset('star.png') }}" alt="star" class="w-4 h-4 fill-current text-orange-500">
            <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
            <span class="mx-1">/</span>
            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>  
          </div>
          <div class="text-gray-600">
            {{ $movie['genre_names'] }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>


<!-- upcoming movies -->
<div class="container mx-auto px-4 pt-6">
  <div class="Popular-Movies">
    <h2 class="uppercase tracking-tight text-orange-400 text-xl font-medium">upcoming</h2>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3">
      @foreach($upcomingMovies['results'] as $movie)
      <div class="mt-8">
        <a href="#">
          <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}"
            alt="{{ $movie['title'] }}"
            class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
        </a>
        <div class="mt-2">
          <a href="#" class="text-lg font-medium hover:text-gray-300">{{ $movie['title'] }}</a>
          <div class="flex items-center text-gray-600 mt-1">
            <img src="{{ asset('star.png') }}" alt="star" class="w-4 h-4 fill-current text-orange-500">
            <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
            <span class="mx-1">/</span>
            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
          </div>
          <div class="text-gray-600">
            {{ $movie['genre_names'] }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection