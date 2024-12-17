<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guitar->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-home-layout>
    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $guitar->name }}</h1>
        <p class="text-gray-600 mb-4">{{ $guitar->description }}</p>
        <img src="data:image/jpeg;base64,{{ base64_encode($guitar->image_url) }}" alt="{{ $guitar->name }}" class="w-full max-w-md mx-auto mb-8 rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detail Tipe Gitar</h2>
        @if ($guitarTypes->isEmpty())
            <p class="text-gray-500">Tidak ada informasi tipe gitar yang tersedia.</p>
        @else
            <ul class="list-disc list-inside text-gray-600">
                @foreach ($guitarTypes as $type)
                    <li>
                        <strong>{{ $type->type_name }}</strong>: {!! $type->type_description !!}
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</x-home-layout>
