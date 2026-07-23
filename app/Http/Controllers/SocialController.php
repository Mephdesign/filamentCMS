<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{

    public function publishToInstagram()
    {
        $igAccountId = config('services.instagram.account_id') ?? env('IG_ACCOUNT_ID');
        $token = config('services.instagram.access_token') ?? env('IG_ACCESS_TOKEN');

        $caption = '🌐 Zastanawiasz się, jak oszczędzić czas na publikacjach w social media?

        Nasza firma oferuje pełną automatyzację postów dzięki AI! 🤖

        Z jednego wpisu na blogu tworzymy angażujące posty na IG i FB! 📲

        Efektywność, spójność, oszczędność czasu.

        Spróbuj już dziś! ✨

        #Automatyzacja #AI #MediaSpołecznościowe #Innowacje';

        $imageUrl = 'https://mephdesign.pl/auto_fb_ig.png';

        // KROK 1: Tworzenie kontenera mediów
        $containerResponse = Http::post("https://graph.facebook.com/v20.0/{$igAccountId}/media", [
            'image_url'    => $imageUrl,
            'caption'      => $caption,
            'access_token' => $token
        ]);

        if ($containerResponse->failed()) {
            Log::error('Instagram Container Error: ' . $containerResponse->body());
            return false;
        }

        $containerId = $containerResponse->json()['id'];

        // Meta potrzebuje chwili na zaciągnięcie i przetworzenie zdjęcia na swoich serwerach
        sleep(5);

        // KROK 2: Publikacja kontenera na profilu
        $publishResponse = Http::post("https://graph.facebook.com/v20.0/{$igAccountId}/media_publish", [
            'creation_id'  => $containerId,
            'access_token' => $token
        ]);

        if ($publishResponse->failed()) {
            Log::error('Instagram Publish Error: ' . $publishResponse->body());
            return false;
        }

        return true; // Sukces! Post jest na Twoim profilu.
    }
}
