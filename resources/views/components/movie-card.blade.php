<div class="mt-8">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}"
            alt="{{ $movie['title'] }}"
            class="w-64 h-96 object-cover rounded hover:opacity-75 transition duration-400 ease-in-out">
    </a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id']) }}">{{ $movie['title'] }}</a>
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