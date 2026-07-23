@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold mb-8 text-gray-900">Nasz Blog</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($posts as $post)
            <article class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100 flex flex-col justify-between">
                <div>
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                    @endif
                    <div class="p-6">
                        <span class="text-gray-400 text-xs font-semibold uppercase">{{ $post->created_at->format('d M Y') }}</span>
                        <h2 class="text-2xl font-bold my-2 text-gray-900">{{ $post->title }}</h2>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('posts.show', $post->slug) }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">
                        Przeczytaj wpis
                    </a>
                </div>
            </article>
        @empty
            <p class="text-gray-500 col-span-2">Aktualnie nie ma żadnych opublikowanych wpisów.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
@endsection
