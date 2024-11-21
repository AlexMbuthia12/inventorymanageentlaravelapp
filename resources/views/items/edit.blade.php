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
                onclick="updateQuantity(-1)"
                class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300"
            >-</button>
            <input 
                type="number" 
                id="quantity" 
                name="quantity" 
                value="{{ $item->quantity }}" 
                min="0"
                class="w-20 text-center rounded border-gray-300 shadow-sm"
                oninput="updatePrice()"
            >
            <button 
                type="button" 
                onclick="updateQuantity(1)"
                class="px-3 py-2 bg-gray-200 rounded hover:bg-gray-300"
            >+</button>
        </div>
    </div>

    <!-- Unit Price -->
    <div>
        <label for="unit_price" class="block text-sm font-medium text-gray-700">Unit Price:</label>
        <input 
            type="number" 
            id="unit_price" 
            name="unit_price" 
            value="{{ $item->unit_price }}" 
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
            name="price" 
            value="{{ $item->quantity * $item->unit_price }}" 
            readonly 
            class="mt-1 block w-full bg-gray-100 rounded border-gray-300 shadow-sm"
        >
    </div>

    <!-- Submit Button -->
    <button 
        type="submit" 
        class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded shadow hover:bg-blue-700 transition"
    >
        Save Changes
    </button>
</form>

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
