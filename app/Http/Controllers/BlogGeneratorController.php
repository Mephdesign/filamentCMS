<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BlogGeneratorController extends Controller
{
    // Wyświetla formularz
    public function index()
    {
        return view('blog-generator');
    }

    // Obsługuje zapytanie do OpenAI
    public function generate(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:255',
        ]);

        $topic = $request->input('topic');
        $apiKey = config('services.openai.key');

        try {
            $response = Http::withToken($apiKey)
                ->timeout(60)
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Jesteś ekspertem od marketingu i copywritingu. Twoim zadaniem jest stworzenie paczki treści na podstawie tematu użytkownika. Wygeneruj artykuł na bloga, angażujący post na Facebooka oraz estetyczny post na Instagrama (z emotikonami i hashtagami). Odpowiedz WYŁĄCZNIE w formacie JSON o następującej strukturze:
                        {
                            "title": "Tytuł artykułu",
                            "content": "Pełna treść artykułu z podziałem na akapity",
                            "facebook_post": "Treść posta na FB. Ma przyciągać uwagę, zachęcać do dyskusji lub kliknięcia w link, zawierać emotikony.",
                            "instagram_post": "Treść posta na IG. Krótsza, nastawiona na storytelling, z podziałem na linie, zakończona dopasowanymi hashtagami.",
                            "instagram_visual": "Krótki opis (sugestia), jak powinno wyglądać zdjęcie, grafika lub wideo (rolka) do tego posta."
                        }'
                        ],
                        [
                            'role' => 'user',
                            'content' => "Przygotuj paczkę treści dla tematu: {$topic}."
                        ]
                    ],
                    'response_format' => ['type' => 'json_object'],
                    'temperature' => 0.7,
                ]);

            if ($response->failed()) {
                return back()->withErrors('Błąd OpenAI: ' . $response->body());
            }

            $result = $response->json();
            $aiData = json_decode($result['choices'][0]['message']['content'], true);

            // Przekazujemy wszystkie dane do widoku przez sesję
            return redirect()->route('blog.index')->with([
                'title' => $aiData['title'] ?? 'Brak tytułu',
                'content' => $aiData['content'] ?? 'Brak treści',
                'facebook_post' => $aiData['facebook_post'] ?? 'Brak posta FB',
                'instagram_post' => $aiData['instagram_post'] ?? 'Brak posta IG',
                'instagram_visual' => $aiData['instagram_visual'] ?? 'Brak sugestii grafiki',
            ]);

        } catch (\Exception $e) {
            return back()->withErrors('Wystąpił błąd: ' . $e->getMessage());
        }
    }
}
