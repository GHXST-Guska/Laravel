@extends('layouts.admin-layout')

@section('title', 'Edit Guitar')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold">Edit Guitar</h1>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            ClassicEditor
                .create(document.querySelector('#type_description'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>      

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('admin.guitars.update', $guitar->id_list) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
        
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold text-gray-700">Name/Type</label>
                <input type="text" id="name" name="name" value="{{ $guitar->name }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold text-gray-700">Description</label>
                <textarea id="description" name="description"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                          required>{{ $guitar->description }}</textarea>
            </div>            
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-bold text-gray-700">Image</label>
                <input type="file" name="image_url" id="image_url">
                @if($guitar->image_url)
                    <p>Foto saat ini: <img src="data:image/jpeg;base64,{{ base64_encode($guitar->image_url) }}" alt={{ $guitar->name }} style="max-width: 100px;"></p>
                @endif
            </div>
            <div class="mb-4">
                <label for="brand" class="block text-sm font-bold text-gray-700">Brand</label>
                <input type="text" id="brand" name="brand" value="{{ $guitar->brand }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-bold text-gray-700">Price</label>
                <input type="number" id="price" name="price" value="{{ $guitar->price }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="type_description" class="block text-sm font-bold text-gray-700">Type Description</label>
                <textarea id="type_description" name="type_description"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                          required>{{ old('type_description', $guitarType->type_description ?? '') }}</textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    Update Guitar
                </button>
            </div>
        </form>        
    </div>
@endsection
