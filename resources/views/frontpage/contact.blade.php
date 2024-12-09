<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <x-home-layout>
    <main class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-semibold mb-4">Contact</h2>
        <p class="mb-6">Hubungi kami melalui formulir di bawah ini untuk pertanyaan atau informasi lebih lanjut.</p>
        <form class="bg-white shadow-lg rounded-lg p-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2 mb-4">
            
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2 mb-4">
            
            <label for="message" class="block text-sm font-medium text-gray-700">Pesan:</label>
            <textarea id="message" name="message" class="mt-1 block w-full border border-gray-300 rounded-md p-2 mb-4"></textarea>
            
            <button type="submit" class="bg-blue-600 text-white rounded-lg px-4 py-2">Kirim</button>
        </form>
    </main>
    </x-home-layout>
</body>
</html>
