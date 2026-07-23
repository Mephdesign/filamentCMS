<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class SiteContext
{
    // Pobiera ID strony przypisanej do zalogowanego użytkownika
    public static function getCurrentSiteId(): ?int
    {
        // Wyciągamy pierwszą stronę, do której zalogowany użytkownik ma relację
        $site = Auth::user()?->sites()->first();

        return $site ? $site->id : null;
    }

    // Pobiera pełny model strony
    public static function getCurrentSite(): ?Site
    {
        return Auth::user()?->sites()->first();
    }
}
