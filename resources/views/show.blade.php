@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-row">
        <div class="w-96 flex-shrink-0">
            <img src="{{ asset('dune.jpg') }}" alt="Dune" class="w-full h-full object-cover rounded">
        </div>
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
        </div>
    </div>
</div>
@endsection