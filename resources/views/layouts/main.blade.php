<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>

    @vite(['resources/css/app.css'])
    @vite('resources/js/app.js') 

</head>
<body class="font-sans bg-gray-800 text-white">
    <nav class="border-b border-gray-600 ">
        <div class="container mx-auto flex items-center justify-between px-2 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('pirate.svg') }}" alt="Logo" width="20" height="24">
                        <span class="ml-2 text-lg font-semibold">Movie App</span> 
                    </a>
                </li>
            </ul>
        </div>  
    </nav> 
    @yield('content') 
</body>
</html>