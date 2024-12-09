<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Gitar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <x-home-layout>
        <div class="max-w-3xl mx-auto text-center py-8">
            <h1 class="text-4xl font-bold text-green-600 mb-4">Galeri Gitar</h1>
            <p class="text-gray-700 text-lg">Jelajahi berbagai koleksi gitar unik dan berkualitas.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto p-6">
            @foreach ($packages as $item)
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{$item->image}}" alt="{{$item->title}}" class="w-full h-48 object-cover">
                    <div class="p-4 text-center">
                        <h2 class="text-xl font-bold text-gray-800">{{$item->title}}</h2>
                        <p class="text-gray-600 mt-2">{{$item->desc}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-home-layout>
</body>
</html>
