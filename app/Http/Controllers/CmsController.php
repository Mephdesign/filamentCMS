<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Section;
use App\Models\Gallery;
use App\Models\Site;
use App\Models\SiteSetting;
use App\Services\SiteContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CmsController extends Controller
{
    public function home(Request $request)
    {
        $currentUrl = $request->getSchemeAndHttpHost();
        $heroImages = $this->getHeroImage($currentUrl)['images'] ?? [];
        $siteId = Site::where('url', $currentUrl)->first()['id'];
        $sections = Section::where('is_active', true)->where('site_id', $siteId)->get();
        $latestPosts = Post::where('is_published', true)->where('site_id', $siteId)->latest()->take(3)->get();
        $settings = SiteSetting::where('site_id', $siteId)->pluck('value', 'key')->toArray();
        $gallery = $this->getGalleryImages($currentUrl);
        $instagram = $this->getInstagramPosts();
        return view('index', compact('sections', 'latestPosts', 'settings', 'instagram', 'heroImages', 'gallery'));
    }

    public function posts()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function post(string $slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function galleries()
    {
        $site_id = SiteContext::getCurrentSiteId();
        $galleries = Gallery::where('is_visible', true)
            ->where('site_id', $site_id)
            ->latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    public function getHeroImage($currentUrl)
    {
        $siteId = Site::where('url', $currentUrl)->first()['id'];
        $gallery = Gallery::where('title', 'LIKE', '%hero%')
            ->where('site_id', $siteId)
            ->where('is_visible', true)->first();
        return $gallery;
    }

    public function getGalleryImages($currentUrl)
    {
        $siteId = Site::where('url', $currentUrl)->first()['id'];
        $gallery = Gallery::where('site_id', $siteId)
            ->where('is_visible', true)
            ->where('title', 'NOT LIKE', '%hero%')
            ->get();

        // Mapujemy dane do struktury, którą akceptuje Twój skrypt JS
        $galleryData = $gallery->keyBy('slug')->map(function ($gallery) {
            return [
                'title' => $gallery->title,
                'subtitle' => $gallery->description,
                'slug' => $gallery->slug,
                'images' => collect($gallery->images)->map(function ($img) {
                    return asset('storage/' . $img);
                })->toArray()
            ];
        });
        return $galleryData;
    }

    public function getInstagramPosts()
    {
        $posts = Cache::remember('instagram_posts', 3600, function () {
            try {
                // Wklejasz tu link URL wygenerowany w panelu Behold
                $response = Http::get('https://feeds.behold.so/qdAVj0qzSWk3bbEYltMe');

                if ($response->successful()) {
                    return $response->json(); // Behold zwraca czystą tablicę z postami
                }

                Log::error('Behold API Error: ' . $response->body());
                return [];
            } catch (\Exception $e) {
                Log::error('Behold Connection Error: ' . $e->getMessage());
                return [];
            }
        });
        return $posts;
    }
}
