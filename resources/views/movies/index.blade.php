@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 pt-6">

    {{-- Movie Slider Banner --}}
    <div class="mb-8">
        <div class="swiper mySwiper rounded-lg overflow-hidden shadow-lg">
            <div class="swiper-wrapper">
                @foreach($popularMovies['results']->take(5) as $movie)
                    <div class="swiper-slide relative h-64 sm:h-96 cursor-pointer rounded-lg overflow-hidden">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="https://image.tmdb.org/t/p/original{{ $movie['backdrop_path'] ?? $movie['poster_path'] }}"
                                 alt="{{ $movie['title'] }}"
                                 class="object-cover w-full h-full brightness-75 hover:brightness-90 transition duration-300" />
                            <div class="absolute bottom-6 left-6 text-white max-w-lg">
                                <h3 class="text-2xl font-bold drop-shadow-lg">{{ $movie['title'] }}</h3>
                                <p class="mt-2 text-sm drop-shadow-lg">{{ \Illuminate\Support\Str::limit($movie['overview'], 120) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next text-white"></div>
            <div class="swiper-button-prev text-white"></div>

            <!-- Pagination dots -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    {{-- Movie Discovery --}}
    <div class="Popular-Movies">
        <div class="flex items-center gap-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-4.553a1.5 1.5 0 10-2.121-2.121L13 7.879M9 14l-4.553 4.553a1.5 1.5 0 102.121 2.121L11 16.121" />
            </svg>
            <h2 class="text-xl font-semibold text-orange-400 tracking-tight uppercase">Movie Discovery</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($popularMovies['results'] as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
</div>

{{-- Upcoming Movies --}}
<div class="container mx-auto px-4 pt-10">
    <div class="Popular-Movies">
        <div class="flex items-center gap-2 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-semibold text-orange-400 tracking-tight uppercase">Upcoming</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($upcomingMovies['results'] as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Swiper.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });
</script>
@endpush

@push('styles')
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
@endpush
