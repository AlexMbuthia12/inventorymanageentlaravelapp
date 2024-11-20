<!-- resources/views/items/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-300 min-h-screen flex items-center justify-center text-gray-800">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Edit Item</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.update', $item->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Item Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Item Name:</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ $item->name }}" 
                    readonly
                    class="mt-1 block w-full bg-gray-100 rounded border-gray-300 shadow-sm"
                >
            </div>

            <!-- Quantity -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                <div class="flex items-center gap-2">
                    <button 
                        type="button" 
                        onclick="decreaseQuantity()"
                        class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300"
                    >-</button>
                    <input 
                        type="number" 
                        id="quantity" 
                        name="quantity" 
                        value="{{ $item->quantity }}" 
                        min="0"
                        class="w-20 text-center rounded border-gray-300 shadow-sm"
                    >
                    <button 
                        type="button" 
                        onclick="increaseQuantity()"
                        class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300"
                    >+</button>
                </div>
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition"
            >
                Save Changes
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('items.index') }}" class="text-blue-600 hover:text-blue-800 underline">
                Back to Inventory List
            </a>
        </div>
    </div>

    <script>
        function increaseQuantity() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQuantity() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
</body>
</html>
