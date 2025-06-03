<div class="relative ml-4">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        id="search-input" 
        class="block w-64 pl-10 pr-3 py-2 border border-gray-600 rounded-md leading-5 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm" 
        placeholder="Search movies...">

    @if(strlen($search) >= 2) 
        <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-4 overflow-hidden shadow-xl">
            @if(!empty($searchResults))
                <ul>
                    @foreach($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movies.show', $result['id']) }}" 
                               class="flex items-center px-3 py-3 transition ease-in-out duration-150 hover:bg-gray-700">
                                @if($result['poster_path'])  
                                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" 
                                         alt="{{ $result['title'] }}" 
                                         class="w-8 h-12 object-cover rounded">
                                @else
                                    <img src="https://via.placeholder.com/50x75" 
                                         alt="no poster" 
                                         class="w-8 h-12 object-cover rounded">
                                @endif
                                <div class="ml-4">
                                    <div class="font-semibold text-white">{{ $result['title'] }}</div>
                                    <div class="text-gray-400 text-xs">
                                        {{ isset($result['release_date']) ? \Carbon\Carbon::parse($result['release_date'])->format('M d, Y') : 'Release date not available' }}
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>