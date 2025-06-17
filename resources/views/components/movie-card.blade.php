<div class="mt-6 w-44 sm:w-48">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img
            src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}"
            alt="{{ $movie['title'] }}"
            class="w-full h-64 object-cover rounded-lg hover:opacity-80 transition duration-300 ease-in-out shadow-md"
        >
    </a>

    <div class="mt-2">
        <!-- Movie Title (always visible) -->
        <a href="{{ route('movies.show', $movie['id']) }}"
           class="block text-sm font-semibold  leading-snug text-orange-400 transition duration-200">
            {{ $movie['title'] }}
        </a>

        <!-- Rating & Release Date -->
        <div class="flex items-center text-xs text-gray-400 mt-1">
            <img src="{{ asset('star.png') }}" alt="star" class="w-4 h-4">
            <span class="ml-1 text-orange-400 font-medium">{{ $movie['vote_average'] * 10 }}%</span>
            <span class="mx-2 text-gray-500">|</span>
            <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
        </div>

        <!-- Genres -->
        <div class="text-xs text-gray-400 mt-1">  
            {{ $movie['genre_names'] }}
        </div>
    </div>
</div>
