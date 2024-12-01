<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Marivera</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fefbf8] text-gray-900 font-sans">
    <!-- Header -->
    <header class="bg-[#fdf4e3] shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between px-4">
            <!-- Logo -->
            <div class="logo">
                <a href="#home">
                    <img src={{ asset('images/logo.png') }} alt="Marivera Store Logo" class="h-20 object-cover w-20">
                </a>
            </div>
            <!-- Navigation -->
            @include('layouts.navbar')
        </div>
    </header>

    <!-- Main Content --> 
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-10">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Marivera Store. All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
    <script>
        feather.replace();
    </script>
</body>

    </body>
</html>
