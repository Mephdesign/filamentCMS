<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Laravel & Filament</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

<nav class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">MyCMS</a>
        <div class="space-x-4">
            <a href="{{ route('home') }}" class="hover:text-indigo-600">Strona Główna</a>
            <a href="{{ route('posts.index') }}" class="hover:text-indigo-600">Blog</a>
            <a href="{{ route('galleries.index') }}" class="hover:text-indigo-600">Galeria</a>
        </div>
    </div>
</nav>

<main class="flex-grow max-w-6xl w-full mx-auto px-4 py-8">
    @yield('content')
</main>

<footer class="bg-gray-800 text-gray-400 py-6 mt-12 text-center text-sm">
    &copy; {{ date('Y') }} MyCMS. Wszelkie prawa zastrzeżone.
</footer>

</body>
</html>
