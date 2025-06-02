@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-4">
  <div class="Popular-Movies">
    <h2 class="uppercase tracking-tight text-orange-400 text-xl font-medium">Movie Discovery</h2>

    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3">
      @foreach($popularMovies['results'] as $movie)
      <x-movie-card :movie="$movie" :genres="$genres" />
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
      <x-movie-card :movie="$movie" :genres="$genres" />  
      @endforeach 
    </div>
  </div>
</div>

@endsection