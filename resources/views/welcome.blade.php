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

        <!-- Display Total Inventory Price -->
        <div class="mb-6 p-4 bg-gradient-to-r from-green-200 via-green-100 to-green-200 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold text-green-800">Total Inventory Value</h2>
            <p class="text-xl font-bold text-green-700">Ksh{{ number_format($totalInventoryPrice, 2) }}</p>
        </div>

        <!-- Display Total sales -->
        <div class="mb-6 p-4 bg-gradient-to-r from-yellow-200 via-yellow-100 to-yellow-200 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold text-yellow-800">Total Sales</h2>
            <p class="text-xl font-bold text-yellow-700">Ksh{{ number_format($totalSales, 2) }}</p>
            <a href="{{ route('sales.index') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 transition">View Sales</a>
        </div>
        

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
                            <p class="text-gray-600"><strong>Unit Price:</strong> Ksh{{ number_format($item->unit_price, 2) }}</p>
                            <p class="text-gray-600"><strong>Total Unit Price:</strong> Ksh{{ number_format($item->total_unit_price, 2) }}</p>
                            <p class="text-gray-600"><strong>Item Total Price:</strong> Ksh{{ number_format($item->price, 2) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('items.edit', $item->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">Edit</a>

                                <!-- Make Sale Button -->
    <a href="{{ route('sales.create', ['id' => $item->id]) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Make Sale</a>
    {{-- <!-- <a href="{{ route('sales.create', ['id' => $item->id]) }}" --}}
     {{-- <a href="{{ route('sales.create', $item->id) }}">Make Sale</a>  --}}
    {{-- class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition"> --}}
   {{-- Create Sale
</a> --> --}}
{{-- <!-- @foreach($items as $item) --}}
    {{-- <a href="{{ route('sales.create', ['id' => $item->id]) }}"  --}}
       {{-- class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition"> --}}
       {{-- Create Sale --}}
    {{-- </a> --}}
{{-- @endforeach --> --}}
                                
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
        <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button 
            type="submit" 
            class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition"
        >
            Logout
        </button>
    </form>
    </div>
</body>
</html>
