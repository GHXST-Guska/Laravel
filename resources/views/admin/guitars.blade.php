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

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    @endif

    <div class="mb-4">
        <form method="GET" action="{{ route('admin.guitars') }}">
            <div class="flex space-x-4">
                <div>
                    <input type="text" name="search" placeholder=" Search by name"
                           class="w-full h-full border-gray-300 rounded shadow-md focus:border-green-500 focus:ring-green-500" 
                           value="{{ request('search') }}">
                </div>
                <div>
                    <input type="text" name="brand" placeholder=" Search by brand"
                           class="w-full h-full border-gray-300 rounded shadow-md focus:border-green-500 focus:ring-green-500" 
                           value="{{ request('brand') }}">
                </div>
                <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">
                    Filter
                </button>
                <a href="{{ route('admin.guitars') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-400">
                    Clear Filter
                </a>
            </div>
        </form>
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
                               
                            <form action="{{ route('admin.guitars.destroy', $guitar->id_list) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:underline"
                                        id="delete-button-{{ $guitar->id_list }}">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $guitars->appends(request()->query())->links() }}
    </div>
@endsection
