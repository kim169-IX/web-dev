@extends('layouts.main')

@section('content')
<div class="movie-info  border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-row">
        <div class="w-96 flex-shrink-0">
            <img src="{{ asset('dune.jpg') }}" alt="Dune" class="w-full h-full object-cover rounded">
        </div>

        <!-- movie-info -->
        <div class="ml-24">
            <h2 class="text-4xl font-semibold">Dune (2020)</h2>
            <div class="flex items-center text-gray-600 mt-1">
                <img src="{{ asset('star.png') }}" alt="star" class="w-4 h-4 fill-current text-orange-500">
                <span class="ml-1">75%</span>
                <span class="mx-1">/</span>
                <span>Feb 20, 2020</span>
                <span class="mx-1">/</span>
                <span>Adventure, Action, Love </span>
            </div>
            <p class="text-gray-600 mt-5 ">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis voluptatum temporibus consequuntur repudiandae ipsum porro tempore mollitia
                labore ut obcaecati unde excepturi iste!
                modi earum facilis nesciunt veniam nisi laboriosam
            </p>
            <!-- end movie-info -->


            <!-- featured cast -->
            <div class="mt-10">
                <h4 class="text-gray-600 font-semibold">Featured Cast</h4>
                <div class="flex mt-2">
                    <div>
                        <div>Timothée Chalamet</div>
                        <div class='text-sm text-gray-400'>Screenplay</div>
                    </div>
                    <div class=" ml-8 ">
                        <div>
                            <div>Zendaya</div>
                            <div class='text-sm text-gray-400'>Screenplay</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end featured cast -->

            <div class="mt-12">
                <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-4 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    <span class="ml-2">Play Trailer</span>
                </button>
            </div>
        </div>
    </div>

    <!-- cast section -->
    <div class="container mx-auto px-4 pt-6">
        <div class="Popular-Movies">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                <div class="mt-8">
                    <a href="#">
                        <img src="{{ asset('dune.jpg') }}" alt="Timothée Chalamet" class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <span class="text-lg font-medium">Timothée Chalamet</span>
                        <div class="text-gray-600">Paul Atreides</div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#">
                        <img src="{{ asset('dune.jpg') }}" alt="Zendaya" class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <span class="text-lg font-medium">Zendaya</span>
                        <div class="text-gray-600">Chani</div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#">
                        <img src="{{ asset('dune.jpg') }}" alt="Rebecca Ferguson" class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <span class="text-lg font-medium">Rebecca Ferguson</span>
                        <div class="text-gray-600">Lady Jessica</div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#">
                        <img src="{{ asset('dune.jpg') }}" alt="Oscar Isaac" class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <span class="text-lg font-medium">Oscar Isaac</span>
                        <div class="text-gray-600">Duke Leto Atreides</div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#">
                        <img src="{{ asset('dune.jpg') }}" alt="Jason Momoa" class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
                    </a>
                    <div class="mt-2">
                        <span class="text-lg font-medium">Jason Momoa</span>
                        <div class="text-gray-600">Duncan Idaho</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- images section -->
    <div class="movie-images container mx-auto px-4 pt-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-4 md:grid-cols-4 gap-8 mt-8">
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 1" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 2" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
            <div class="movie-image">
                <a href="#">
                    <img src="{{ asset('dune.jpg') }}" alt="Dune Image 3" 
                        class="w-96 h-64 object-cover hover:opacity-75 transition ease-in-out duration-150 rounded">
                </a>
            </div>
        </div>
    </div>
    @endsection