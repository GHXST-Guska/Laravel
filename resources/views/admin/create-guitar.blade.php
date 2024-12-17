@extends('layouts.admin-layout')

@section('title', 'Create Guitar')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold">Create New Guitar</h1>
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
        <form action="{{ route('admin.guitars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="id_list" class="block text-sm font-bold text-gray-700">ID</label>
                <input type="number" id="id_list" name="id_list"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="name_type" class="block text-sm font-bold text-gray-700">Name/Type</label>
                <input type="text" id="name_type" name="name_type"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                          required></textarea>
            </div>            
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-bold text-gray-700">Image</label>
                <input type="file" id="image_url" name="image_url"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       accept="image/*">
            </div>
            <div class="mb-4">
                <label for="brand" class="block text-sm font-bold text-gray-700">Brand</label>
                <input type="text" id="brand" name="brand"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-bold text-gray-700">Price</label>
                <input type="number" id="price" name="price"
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                       required>
            </div>
            <div class="mb-4">
                <label for="type_description" class="block text-sm font-bold text-gray-700">Detailed Description</label>
                <textarea id="type_description" name="type_description" rows="4"
                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500"
                          required>{{ old('type_description') }}</textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
