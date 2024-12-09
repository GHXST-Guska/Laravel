<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-home-layout>
    <div class="max-w-3xl items-center justify-center text-center mx-auto py-8">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Selamat Datang di Dunia Musik dan Gitar</h1>
        <p class="text-lg text-gray-600 mb-5">Eksplorasi berbagai koleksi gitar yang kami sediakan.</p>
    </div>

    <section class="flex flex-wrap max-w-4xl mx-auto justify-center p-5 gap-6">
        @foreach ($guitars as $guitar)
            <div class="w-full md:w-1/3 bg-white border border-gray-300 rounded-lg shadow-lg p-6 
            text-center hover:shadow-xl transition-shadow duration-300">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $guitar->name }}</h2>
                <p class="text-gray-600 mb-6">{{ $guitar->description }}</p>
                <a href="{{ route('about', ['id' => $guitar->id_list]) }}" class="text-blue-500 font-semibold 
                    hover:underline">
                    Lihat Detail
                </a>                
            </div>
        @endforeach
    </section>
</x-home-layout>