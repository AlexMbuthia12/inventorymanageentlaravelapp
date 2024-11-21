<!-- resources/views/items/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-100 to-gray-300 min-h-screen flex items-center justify-center text-gray-800">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Create New Item</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
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
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm"
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
                    min="0" 
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                    oninput="updatePrice()"
                >
            </div>

            <!-- Unit Price -->
            <div>
                <label for="unit_price" class="block text-sm font-medium text-gray-700">Unit Price:</label>
                <input 
                    type="number" 
                    id="unit_price" 
                    name="unit_price" 
                    required 
                    min="0" 
                    step="0.01"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                    oninput="updatePrice()"
                >
            </div>

            <!-- Total Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Total Price:</label>
                <input 
                    type="text" 
                    id="price" 
                    readonly 
                    class="mt-1 block w-full bg-gray-100 rounded border-gray-300 shadow-sm"
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition"
            >
                Create Item
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('items.index') }}" class="text-blue-600 hover:text-blue-800 underline">
                Back to Inventory List
            </a>
        </div>
    </div>

    <script>
        function updatePrice() {
            const quantity = document.getElementById('quantity').value || 0;
            const unitPrice = document.getElementById('unit_price').value || 0;
            const totalPrice = quantity * unitPrice;
            document.getElementById('price').value = totalPrice.toFixed(2);
        }
    </script>
</body>
</html>
