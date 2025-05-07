<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white shadow px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4 w-full">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/">
                    <img src="/logo.png" alt="Logo" class="w-12 h-12">
                </a>
            </div>

            <!-- Search bar -->
            <div class="flex-grow mx-6">
                <input type="text" placeholder="Search products..." class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <!-- Icons -->
            <div class="flex items-center space-x-4">
                <a href="/profile">
                    <x-heroicon-o-user class="w-6 h-6 text-gray-600" />
                </a>
                <a href="/cart">
                    <x-heroicon-o-shopping-cart class="w-6 h-6 text-gray-600" />
                </a>
            </div>
        </div>
    </nav>

    <!-- Categories -->
    <div class="bg-indigo-600 text-white px-6 py-3">
        <div class="flex space-x-6 text-sm font-medium">
            <a href="#" class="hover:underline">Cement</a>
            <a href="#" class="hover:underline">Steel</a>
            <a href="#" class="hover:underline">Plumbing</a>
            <a href="#" class="hover:underline">Glass</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex px-6 py-8 space-x-6">
        <!-- Filter Card -->
        <div class="w-1/4 bg-white p-4 rounded shadow">
            <h2 class="font-semibold mb-2">Filter</h2>
            <label class="block mb-2">
                <input type="checkbox" name="in_stock" class="mr-2"> In Stock
            </label>
            <label class="block mb-2">
                <input type="checkbox" name="out_stock" class="mr-2"> Out of Stock
            </label>
            <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">Apply</button>
        </div>

        <!-- Product Cards -->
        <div class="w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products->sortByDesc('in_stock') as $product)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">Price: ${{ number_format($product->price, 2) }}</p>
                    <span class="inline-block px-2 py-1 text-xs rounded 
                        {{ $product->in_stock ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $product->in_stock ? 'In Stock' : 'Out of Stock' }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6 mt-10">
        <div class="text-center text-sm">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </div>
    </footer>

</body>
</html>
