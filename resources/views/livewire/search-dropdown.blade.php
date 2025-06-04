<div class="relative w-full max-w-4xl mx-auto">
    <!-- Search and Filters Container -->
    <div class="flex items-center justify-between space-x-4">
        <!-- Search Bar Group -->
        <div class="relative flex-1 max-w-lg">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input
                wire:model.live.debounce.500ms="search"
                type="text"
                class="w-full h-9 pl-9 pr-3 text-sm border border-gray-600 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search movies...">
            
            <!-- Loading Spinner -->
            <div wire:loading class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>

            <!-- Results Dropdown -->
            @if(strlen($search) >= 2)
                <div class="absolute z-50 w-full mt-2 bg-gray-800 rounded-md shadow-lg border border-gray-700 overflow-hidden">
                    @if(count($searchResults) > 0)
                        <ul class="divide-y divide-gray-700">
                            @foreach($searchResults as $result)
                                <li class="group hover:bg-gray-700/50 transition duration-150">
                                    <a href="{{ route('movies.show', $result['id']) }}" class="flex items-center px-4 py-2">
                                        <div class="flex-shrink-0 w-8 h-12 bg-gray-600 rounded overflow-hidden">
                                            @if(isset($result['poster_path']) && $result['poster_path'])
                                                <img src="https://image.tmdb.org/t/p/w92{{ $result['poster_path'] }}" 
                                                     alt="{{ $result['title'] }}" 
                                                     class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-white group-hover:text-blue-400 transition">{{ $result['title'] }}</p>
                                            <p class="text-xs text-gray-400">
                                                {{ isset($result['release_date']) ? date('Y', strtotime($result['release_date'])) : 'N/A' }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="px-4 py-2 text-sm text-gray-400">No results found for "{{ $search }}"</div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Filters Group -->
        <div class="flex items-center space-x-2">
            <select wire:model.live="yearFilter" class="h-9 w-20 text-xs rounded-md border border-gray-600 bg-gray-700 text-white px-2">
                <option value="">Year</option>
                @for($year = date('Y'); $year >= 1900; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>

            <select wire:model.live="genreFilter" class="h-9 w-24 text-xs rounded-md border border-gray-600 bg-gray-700 text-white px-2">
                <option value="">Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                @endforeach
            </select>

            <select wire:model.live="sortBy" class="h-9 w-24 text-xs rounded-md border border-gray-600 bg-gray-700 text-white px-2">
                <option value="popularity.desc">Popular</option>
                <option value="vote_average.desc">Rating</option>
                <option value="release_date.desc">Latest</option>
                <option value="release_date.asc">Oldest</option>
            </select>
        </div>
    </div>
</div>