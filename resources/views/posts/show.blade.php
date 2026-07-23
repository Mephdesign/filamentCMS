@extends('layouts.app')

@section('content')
    <article class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-sm border border-gray-100">
        <header class="mb-6">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
            <p class="text-gray-400 text-sm">Opublikowano: {{ $post->created_at->format('d.m.Y H:i') }}</p>
        </header>

        @if($post->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
            </div>
        @endif

        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! $post->content !!}
        </div>

        <div class="mt-12 border-t pt-6">
            <a href="{{ route('posts.index') }}" class="text-indigo-600 hover:underline">&larr; Powrót do listy wpisów</a>
        </div>
    </article>
@endsection
