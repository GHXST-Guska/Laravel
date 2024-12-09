<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #34D399;
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background-color: #059669;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-green-600 text-white">
            <div class="p-6 text-center">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <p class="text-sm mt-2">Manage Your Content</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.guitars') }}" 
                   class="block py-2 px-4 hover:bg-green-700 {{ request()->routeIs('admin.guitars') ? 'bg-green-700' : '' }}">
                    Manage Guitars
                </a>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-bold">@yield('page-title', 'Dashboard')</h1>
                <div>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="text-sm text-green-600 hover:text-green-800 font-semibold">
                        Logout
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </header>
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>
