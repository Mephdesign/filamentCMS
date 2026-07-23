@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold mb-8 text-gray-900">Galerie Zdjęć</h1>

    @forelse($galleries as $gallery)
        <div class="mb-16 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $gallery->title }}</h2>
            @if($gallery->description)
                <p class="text-gray-600 mb-6">{{ $gallery->description }}</p>
            @endif

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @if(is_array($gallery->images))
                    @foreach($gallery->images as $image)
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 shadow-inner group">
                            <img src="{{ asset('storage/' . $image) }}" alt="Zdjęcie z galerii" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500">Brak dostępnych galerii w tej chwili.</p>
    @endforelse
@endsection
