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
        class="block w-64 pl-10 pr-3 py-2 border border-gray-600 rounded-md leading-5 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
        placeholder="Search movies...">

    <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2 shadow-lg">
        <ul>
            <li class="border-b border-gray-700">
                <a href="#" class="block px-4 py-3 hover:bg-gray-700 text-white transition duration-150 ease-in-out">{{ $search }}</a>
            </li>
        </ul>
    </div>
</div>




<!-- <div class="flex items-center">
                        <div class="w-8 h-12 bg-gray-600 rounded"></div>
                        <div class="ml-4">
                            <div class="font-semibold">{{$search}}</div>
                            <div class="text-sm text-gray-400">2025</div>
                        </div>
                    </div> -->










<!-- <div class="relative ml-4">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
    <input
        wire:model.debounce.500ms="search"
        type="text"
        id="search-input"
        class="block w-64 pl-10 pr-3 py-2 border border-gray-600 rounded-md leading-5 bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm transition duration-150 ease-in-out"
        placeholder="Search movies...">

    <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2 shadow-lg">
        <ul>
            <li class="border-b border-gray-700">
                <a href="#" class="block px-4 py-3 hover:bg-gray-700 text-white transition duration-150 ease-in-out">
                    <div class="flex items-center">
                        <div class="w-8 h-12 bg-gray-600 rounded"></div>
                        <div class="ml-4">
                            <div class="font-semibold">{{$search}}</div>
                            <div class="text-sm text-gray-400">2025</div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div> -->