<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SiteViewFinder
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pobieramy samą domenę (np. stronaA.pl lub localhost)
        $host = $request->getHost();
        // Ścieżka do folderu z widokami dla tej konkretnej strony
        $siteViewsPath = resource_path("views/sites/{$host}");
        // Sprawdzamy, czy folder dla tej domeny w ogóle istnieje
        if (file_exists($siteViewsPath)) {

            // Prepend dodaje nową ścieżkę na sam początek szukania widoków w Laravelu
            View::getFinder()->prependLocation($siteViewsPath);
        }
        return $next($request);
    }
}
