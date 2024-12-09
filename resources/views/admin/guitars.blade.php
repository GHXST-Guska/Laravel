@extends('layouts.admin-layout')

@section('title', 'Manage Guitars')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Manage Guitars</h1>
        <a href="{{ route('admin.guitars.create') }}" 
           class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
           Create New Guitar
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name/Type</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Brand</th>
                    <th class="border px-4 py-2">Price</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guitars as $guitar)
                    <tr>
                        <td class="border px-4 py-2">{{ $guitar->name }}</td>
                        <td class="border px-4 py-2">{{ $guitar->description }}</td>
                        <td class="border px-4 py-2">{{ $guitar->brand }}</td>
                        <td class="border px-4 py-2">{{ '$' . number_format($guitar->price, 0) }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            
                            <a href="{{ route('admin.guitars.edit', $guitar->id_list) }}" 
                               class="text-blue-600 hover:underline">Edit</a>
                               
                            <form action="{{ route('admin.guitars.destroy', $guitar->id_list) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        onclick="return confirm('Are you sure you want to delete this guitar data?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
