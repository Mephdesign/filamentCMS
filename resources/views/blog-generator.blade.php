<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Artykułów i Social Media AI</title>
    <!-- Tailwind CSS dla ładnego wyglądu -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">
<div class="max-w-5xl mx-auto">

    <!-- Główny formularz wprowadzania pomysłu -->
    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
        <h1 class="text-2xl font-bold mb-2 text-gray-800">🚀 Generator Treści AI (Autopilot Marketingowy)</h1>
        <p class="text-sm text-gray-500 mb-6">Wpisz swój pomysł, a sztuczna inteligencja przygotuje komplet materiałów na bloga oraz portale społecznościowe.</p>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                <p class="text-red-700 font-medium">Coś poszło nie tak:</p>
                <ul class="list-disc list-inside text-sm text-red-600 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blog.generate') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="topic" class="block text-sm font-semibold text-gray-700 mb-1">Twój pomysł / temat artykułu:</label>
                <input type="text" id="topic" name="topic" required value="{{ old('topic') }}"
                       placeholder="np. Jak dbać o silnik zimą, 5 sposobów na oszczędzanie w firmie"
                       class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-800">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold p-3 rounded-md transition duration-200 shadow-md">
                Generuj paczkę marketingową (Drafty)
            </button>
        </form>
    </div>

    <!-- Sekcja z wygenerowanymi wynikami (pokazuje się tylko po udanym zapytaniu) -->
    @if(session('title'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8 rounded">
            <p class="text-green-700 font-medium">Sukces! Twoja paczka materiałów została wygenerowana i czeka na weryfikację.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Lewa kolumna: Treść artykułu na bloga (szersza) -->
            <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4 border-b border-gray-100 pb-4">
                    <span class="bg-amber-100 text-amber-800 text-xs font-bold px-2.5 py-1 rounded-full uppercase">Szkic Artykułu</span>
                </div>

                <article class="prose max-w-none">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">{{ session('title') }}</h2>
                    <div class="text-gray-700 leading-relaxed space-y-4 whitespace-pre-line">
                        {{ session('content') }}
                    </div>
                </article>
            </div>

            <!-- Prawa kolumna: Posty na Social Media -->
            <div class="space-y-6">

                <!-- Boks Facebook -->
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-600">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-bold text-blue-900 flex items-center text-lg">
                            <span class="mr-2 text-xl">📘</span> Facebook Post
                        </h3>
                        <button onclick="navigator.clipboard.writeText(`{{ addslashes(session('facebook_post')) }}`)"
                                class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-2 py-1 rounded transition">
                            Kopiuj
                        </button>
                    </div>
                    <div class="text-gray-700 text-sm whitespace-pre-line bg-gray-50 p-4 rounded border border-gray-100 font-sans">
                        {{ session('facebook_post') }}
                    </div>
                </div>

                <!-- Boks Instagram -->
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-pink-500">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="font-bold text-pink-900 flex items-center text-lg">
                            <span class="mr-2 text-xl">📸</span> Instagram Post
                        </h3>
                        <button onclick="navigator.clipboard.writeText(`{{ addslashes(session('instagram_post')) }}`)"
                                class="text-xs bg-gray-100 hover:bg-gray-200 text-gray-600 px-2 py-1 rounded transition">
                            Kopiuj
                        </button>
                    </div>
                    <div class="text-gray-700 text-sm whitespace-pre-line bg-gray-50 p-4 rounded border border-gray-100 font-sans mb-4">
                        {{ session('instagram_post') }}
                    </div>

                    <!-- Sugestia grafiki -->
                    <div class="bg-pink-50 p-3 rounded border border-pink-100">
                        <p class="text-xs text-pink-800">
                            <strong>💡 Pomysł na grafikę / wideo (Rolkę):</strong><br>
                            {{ session('instagram_visual') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    @endif

</div>
</body>
</html>
