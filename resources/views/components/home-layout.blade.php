<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musik dan Gitar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-gray-800 text-white py-4 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">Musik dan Gitar</h1>
            <nav class="space-x-4">
                <a href="{{ route('landing') }}" class="hover:underline">Home</a>
                <a href="{{ route('gallery') }}" class="hover:underline">Gallery</a>
                <a href="{{ route('contact') }}" class="hover:underline">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <div class="min-h-screen flex flex-col">
        <footer class="bg-gray-800 text-white text-center py-4 fixed bottom-0 left-0 w-full">
            <p>&copy; 2024 Guska's Guitar. All rights reserved.</p>
        </footer>
    </div>
    
</body>
</html>
