@extends('layouts.main')

@section('content')
<div class="movie-info  border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-row">
        <div class="w-96 flex-shrink-0">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="w-full h-full object-cover rounded">
        </div>

        <!-- movie-info -->
        <div class="ml-24">
            <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
            <div class="flex items-center text-gray-600 mt-1">
                <img src="{{ asset('star.png') }}" alt="star" class="w-4 h-4 fill-current text-orange-500">
                <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
                <span class="mx-1">/</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                <span class="mx-1">/</span>
                <span>
                    {{ $movie['genre_names'] }}
                </span>
            </div>
            <p class="text-gray-600 mt-5 ">
                {{ $movie['overview'] }}
            </p>
            <!-- end movie-info -->


            <!-- featured cast -->
            <div class="mt-10">
                <h4 class="text-gray-600 font-semibold">Featured Cast</h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($movie['cast'] as $cast)
                    <div class="mt-4">
                        <div class="font-bold">{{ $cast['name'] }}</div>
                        <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end featured cast -->

            @if(isset($movie['videos']['results'][0]['key']))
            <!-- play trailer -->
            <div class="mt-12">
                <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key']}}" class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-5 hover:bg-orange-600 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    <span class="ml-2">Play Trailer</span>
                </a>
            </div>
            @endif
            <!-- end play trailer -->
        </div> 
    </div>

    <!-- cast section -->
    <div class="container mx-auto px-4 pt-6">
        <div class="Popular-Movies">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div x-data="{ showAll: false }" class="relative">
                <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                    @foreach($movie['cast'] as $index => $cast)
                    <div class="mt-8" 
                         x-show="showAll || {{ $index }} < 10"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="relative group">
                            @if($cast['profile_path'])
                                <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}"

                                    alt="{{ $cast['name'] }}"
                                    loading="lazy"
                                    class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                            @else
                                <div class="w-64 h-96 bg-gray-800 flex items-center justify-center rounded">
                                    <span class="text-gray-500">No Image Available</span>
                                </div>
                            @endif
                            
                            <!-- Hover Info -->
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-black bg-opacity-75 text-white transform 
                                        translate-y-full group-hover:translate-y-0 transition-transform duration-300 rounded-b">
                                <span class="text-lg font-medium block">{{ $cast['name'] }}</span>
                                <span class="text-gray-300 text-sm">{{ $cast['character'] }}</span>
                                @if(isset($cast['known_for_department']))
                                    <span class="text-gray-400 text-xs block">{{ $cast['known_for_department'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if(count($movie['cast']) > 10)
                    <div class="text-center mt-8">
                        <button @click="showAll = !showAll" 
                                class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition duration-150"
                                x-text="showAll ? 'Show Less' : 'Show More'">
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- images section -->
    <div class="movie-images container mx-auto px-3 pt-32 mt-16 border-t border-gray-200" 
         x-data="{ 
            selectedImage: null,
            showModal: false,
            images: @js($movie['images']),
            currentIndex: 0,
            isZoomed: false,
            nextImage() {
                this.currentIndex = (this.currentIndex + 1) % this.images.length;
                this.selectedImage = this.images[this.currentIndex].file_path;
                this.isZoomed = false;
            },
            previousImage() {
                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                this.selectedImage = this.images[this.currentIndex].file_path;
                this.isZoomed = false;
            },
            toggleZoom() {
                this.isZoomed = !this.isZoomed;
            }
         }">
        <h2 class="text-4xl font-semibold">Images</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
            @foreach($movie['images'] as $index => $image)
            <div class="movie-image group relative overflow-hidden rounded-lg shadow-lg">
                <div class="aspect-w-16 aspect-h-9">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}"
                        alt="Movie Image"
                        loading="lazy"
                        @click="selectedImage = '{{ $image['file_path'] }}'; showModal = true; currentIndex = {{ $index }}"
                        class="w-full h-full object-cover transform hover:scale-105 transition duration-300 cursor-pointer">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modal/Lightbox -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4">
            <div class="relative max-w-5xl w-full" @click.away="showModal = false">
                <!-- Close button -->
                <button @click="showModal = false" class="absolute top-4 right-4 text-white hover:text-gray-300 z-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Zoom toggle button -->
                <button @click="toggleZoom()" 
                        class="absolute top-4 right-16 text-white hover:text-gray-300 z-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isZoomed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        <path x-show="isZoomed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7m6 0v6m4-6h-6"/>
                    </svg>
                </button>

                <!-- Navigation buttons -->
                <button @click="previousImage()" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button @click="nextImage()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Image with zoom functionality -->
                <div class="overflow-auto h-[80vh] w-full">
                    <img :src="'https://image.tmdb.org/t/p/original/' + selectedImage" 
                         :class="{ 
                             'max-h-[80vh] mx-auto object-contain transition-transform duration-300': !isZoomed,
                             'w-[200%] max-w-none cursor-move transition-transform duration-300': isZoomed 
                         }"
                         @click="toggleZoom()"
                         alt="Full size movie image">
                </div>
            </div>
        </div>
    </div>
    @endsection