
<script src="https://cdn.tailwindcss.com"></script>

<!-- <body class="bg-gradient-to-r from-gray-100 to-gray-300 min-h-screen flex items-center justify-center text-gray-800"> -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-purple-500 to-pink-500 p-6">
    <form 
        action="{{ route('items.update', $item->id) }}" 
        method="POST" 
        class="bg-white p-8 md:p-12 rounded-2xl shadow-2xl w-full max-w-lg space-y-6 transition-transform transform hover:scale-[1.02]"
    >
        @csrf
        @method('PUT')

        <!-- Title -->
        <h2 class="text-4xl font-extrabold text-purple-800 text-center">
            🖊️ Edit Item
        </h2>
        <p class="text-sm text-gray-500 text-center mb-6">
            Update item details and save your changes.
        </p>

        <!-- Item Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Item Name
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ $item->name }}" 
                readonly 
                class="block w-full bg-gray-200 text-gray-800 rounded-lg border border-gray-300 px-4 py-2 shadow-inner focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50"
            >
        </div>

        <!-- Quantity -->
        <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">
                Quantity
            </label>
            <div class="flex items-center gap-3">
                <button 
                    type="button" 
                    onclick="updateQuantity(-1)"
                    class="px-4 py-2 bg-red-500 text-white rounded-full shadow-lg hover:bg-red-600 hover:shadow-xl transition"
                >
                    −
                </button>
                <input 
                    type="number" 
                    id="quantity" 
                    name="quantity" 
                    value="{{ $item->quantity }}" 
                    min="0"
                    class="w-24 text-center bg-gray-50 text-gray-800 rounded-lg border border-gray-300 px-2 py-2 shadow-inner focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50"
                    oninput="updatePrice()"
                >
                <button 
                    type="button" 
                    onclick="updateQuantity(1)"
                    class="px-4 py-2 bg-green-500 text-white rounded-full shadow-lg hover:bg-green-600 hover:shadow-xl transition"
                >
                    +
                </button>
            </div>
        </div>

        <!-- Unit Price -->
        <div>
            <label for="unit_price" class="block text-sm font-medium text-gray-700 mb-1">
                Unit Price
            </label>
            <input 
                type="number" 
                id="unit_price" 
                name="unit_price" 
                value="{{ $item->unit_price }}" 
                step="0.01"
                class="block w-full bg-gray-50 text-gray-800 rounded-lg border border-gray-300 px-4 py-2 shadow-inner focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-50"
                oninput="updatePrice()"
            >
        </div>

        <!-- Total Price -->
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                Total Price
            </label>
            <input 
                type="text" 
                id="price" 
                name="price" 
                value="{{ $item->quantity * $item->unit_price }}" 
                readonly 
                class="block w-full bg-gray-200 text-gray-800 rounded-lg border border-gray-300 px-4 py-2 shadow-inner focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-50"
            >
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full py-3 bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-bold text-lg rounded-lg shadow-lg hover:shadow-xl hover:opacity-95 transition"
        >
            💾 Save Changes
        </button>
    </form>
</div>

<script>
    function updateQuantity(change) {
        const quantityInput = document.getElementById('quantity');
        const currentQuantity = parseInt(quantityInput.value);
        if (currentQuantity + change >= 0) {
            quantityInput.value = currentQuantity + change;
            updatePrice();
        }
    }

    function updatePrice() {
        const quantity = parseInt(document.getElementById('quantity').value);
        const unitPrice = parseFloat(document.getElementById('unit_price').value);
        const totalPrice = quantity * unitPrice;
        document.getElementById('price').value = isNaN(totalPrice) ? '0.00' : totalPrice.toFixed(2);
    }
</script>
