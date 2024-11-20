<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 min-h-screen flex items-center justify-center p-4 text-gray-800">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Create New Item</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Item Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Item Name:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required 
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                <input 
                    type="number" 
                    id="quantity" 
                    name="quantity" 
                    required 
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input 
                    type="text" 
                    id="price" 
                    name="price" 
                    required 
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition"
            >
                Create Item
            </button>
        </form>

        <!-- Back Link -->
        <div class="mt-6 text-center">
            <a 
                href="{{ route('items.index') }}" 
                class="text-blue-600 hover:text-blue-800 underline"
            >
                Back to Inventory List
            </a>
        </div>
    </div>

</body>
</html>
