<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center text-gray-800">
    <div class="container max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <header class="mb-6 text-center">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Inventory Management System</h1>
            <a href="{{ route('items.create') }}" class="px-6 py-2 bg-green-500 text-white font-semibold rounded hover:bg-green-600 transition">Add New Item</a>
        </header>

        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Inventory List</h2>
            @if ($items->isEmpty())
                <p class="text-gray-600 text-center">No items in inventory. Please add some!</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($items as $item)
                        <div class="bg-gradient-to-br from-white via-gray-100 to-gray-200 p-4 rounded-lg shadow-md hover:shadow-lg transition">
                            <h3 class="text-lg font-bold text-gray-700 mb-2">ID: {{ $item->id }}</h3>
                            <p class="text-gray-600"><strong>Name:</strong> {{ $item->name }}</p>
                            <p class="text-gray-600"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                            <p class="text-gray-600"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('items.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
        </div>
        @endif
 
        </section>
    </div>
</body>
</html>
