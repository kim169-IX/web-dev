<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<body>
    <nav class="bg-gray-800">
        <div class="border-gray-600 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger icon -->
                        <svg id="menu-closed-icon" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- X icon -->
                        <svg id="menu-open-icon" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                        <a href="{{ route('movies.index') }}">
                            <img class="h-8 w-auto" src="{{ asset('github.png') }}" alt="Movie App">
                        </a>
                    </div>
                    <div class="hidden sm:block sm:flex-1">
                        <div class="flex justify-center items-center space-x-4">
                            <a href="{{ route('movies.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Explore</a>
                            <a href="{{route('movielist.index')}}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Categories</a>
                            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Watchlist</a>

                            <!-- Search Bar -->
                            <div class="relative ml-4">
                                <livewire:search-dropdown />
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- Profile dropdown -->
                <div class="relative ml-3">
                    <div>
                        <button type="button" id="user-menu-button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="size-8 rounded-full" src="{{ asset('memedog.jpg') }}" alt="Profile">
                        </button>
                    </div>

                    <!-- Dropdown menu - Hidden by default -->
                    <div id="user-menu" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Sign out</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu - Hidden by default -->
        <div class="hidden sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="{{ route('movies.index') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Explore</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Categories</a>
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Watchlist</a>

                <!-- Mobile Search Bar -->
                <div class="relative px-3 py-2">
                    <livewire:search-dropdown />
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content area -->
    <main class="min-h-screen bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="backdrop-blur-sm bg-white/30 shadow-lg rounded-lg pt-2 px-6 pb-6 max-w-[1400px] mx-auto border border-white/20">
                @yield('content')
            </div>
        </div>
    </main>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuClosedIcon = document.getElementById('menu-closed-icon');
        const menuOpenIcon = document.getElementById('menu-open-icon');

        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                // Close menu
                mobileMenu.classList.add('hidden');
                menuClosedIcon.classList.remove('hidden');
                menuClosedIcon.classList.add('block');
                menuOpenIcon.classList.add('hidden');
                menuOpenIcon.classList.remove('block');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            } else {
                // Open menu
                mobileMenu.classList.remove('hidden');
                menuClosedIcon.classList.add('hidden');
                menuClosedIcon.classList.remove('block');
                menuOpenIcon.classList.remove('hidden');
                menuOpenIcon.classList.add('block');
                mobileMenuButton.setAttribute('aria-expanded', 'true');
            }
        });

        // User menu toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        userMenuButton.addEventListener('click', function() {
            const isExpanded = userMenuButton.getAttribute('aria-expanded') === 'true';

            if (isExpanded) {
                userMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            } else {
                userMenu.classList.remove('hidden');
                userMenuButton.setAttribute('aria-expanded', 'true');
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            // Close user menu if clicking outside
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
                userMenuButton.setAttribute('aria-expanded', 'false');
            }

            // Close mobile menu if clicking outside
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                menuClosedIcon.classList.remove('hidden');
                menuClosedIcon.classList.add('block');
                menuOpenIcon.classList.add('hidden');
                menuOpenIcon.classList.remove('block');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });

        // Close search dropdown when clicking outside (for Livewire component)
        document.addEventListener('click', function(event) {
            const searchDropdowns = document.querySelectorAll('[wire\\:model\\.debounce\\.500ms="search"]');
            searchDropdowns.forEach(function(searchInput) {
                const dropdown = searchInput.closest('.relative').querySelector('[class*="absolute"][class*="bg-gray-800"]');
                if (dropdown && !searchInput.closest('.relative').contains(event.target)) {
                    // This will be handled by the Livewire component's logic
                    searchInput.blur();
                }
            });
        });
    </script>
    
    @livewireScripts
</body>
</html>