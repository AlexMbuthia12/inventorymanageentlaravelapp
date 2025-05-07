<!-- {{-- 
<x-guest-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Sales Analytics</h1>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Item</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Total Price</th>
                <th class="px-4 py-2">Sold At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td class="border px-4 py-2">{{ $sale->item->name }}</td>
                    <td class="border px-4 py-2">{{ $sale->quantity }}</td>
                    <td class="border px-4 py-2">${{ number_format($sale->total_price, 2) }}</td>
                    <td class="border px-4 py-2">{{ $sale->sold_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="text-xl font-semibold mt-6">Sales by Hour</h2>
    <ul>
        @foreach ($salesByHour as $hour => $data)
            <li>{{ $hour }}:00 - Total Sales: ${{ number_format($data['total_sales'], 2) }} ({{ $data['total_quantity'] }} items sold)</li>
        @endforeach
    </ul>

    <div class="mt-4 text-center">
        <a href="{{ route('items.index') }}" class="text-blue-600 hover:text-blue-800 underline">
            Back to Inventory List
        </a>
    </div>
</div>

</x-guest-layout> --}} -->
{{-- <x-guest-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Sales Analytics xx</h1>

        <!-- Sales Table -->
        <div class="overflow-x-auto">
            <table class="w-full bg-white dark:bg-gray-800 rounded shadow text-sm">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                        <th class="px-4 py-2 text-left">Item</th>
                        <th class="px-4 py-2 text-left">Quantity</th>
                        <th class="px-4 py-2 text-left">Total Price</th>
                        <th class="px-4 py-2 text-left">Sold At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2">{{ $sale->item->name }}</td>
                            <td class="px-4 py-2">{{ $sale->quantity }}</td>
                            <td class="px-4 py-2">${{ number_format($sale->total_price, 2) }}</td>
                            <td class="px-4 py-2">{{ $sale->sold_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Sales By Hour -->
        <h2 class="text-xl font-semibold mt-8 text-gray-800 dark:text-gray-200">Sales by Hour</h2>
        <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mt-2">
            @foreach ($salesByHour as $hour => $data)
                <li>
                    {{ $hour }}:00 - Total Sales: ${{ number_format($data['total_sales'], 2) }}
                    ({{ $data['total_quantity'] }} items sold)
                </li>
            @endforeach
        </ul>

        <div class="mt-6 text-center">
            <a href="{{ route('items.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200 font-medium rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                ← Back to Inventory List
            </a>
        </div>
        
    </div>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <!-- Main Card -->
        <div class="w-full sm:w-3/4 lg:w-2/3 xl:w-1/2 mt-10 px-8 py-6 bg-white dark:bg-gray-800 shadow-md overflow-auto rounded-lg max-h-[90vh]">
            <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Sales Analytics</h1>

            <!-- Sales Table -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white dark:bg-gray-800 rounded shadow text-sm">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                            <th class="px-4 py-2 text-left">Item</th>
                            <th class="px-4 py-2 text-left">Quantity</th>
                            <th class="px-4 py-2 text-left">Total Price</th>
                            <th class="px-4 py-2 text-left">Sold At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-2">{{ $sale->item->name }}</td>
                                <td class="px-4 py-2">{{ $sale->quantity }}</td>
                                <td class="px-4 py-2">${{ number_format($sale->total_price, 2) }}</td>
                                <td class="px-4 py-2">{{ $sale->sold_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Sales By Hour -->
            <h2 class="text-xl font-semibold mt-8 text-gray-800 dark:text-gray-200">Sales by Hour</h2>
            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mt-2">
                @foreach ($salesByHour as $hour => $data)
                    <li>
                        {{ $hour }}:00 - Total Sales: ${{ number_format($data['total_sales'], 2) }}
                        ({{ $data['total_quantity'] }} items sold)
                    </li>
                @endforeach
            </ul>

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ route('items.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 dark:bg-gray-700 dark:text-gray-200 font-medium rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    ← Back to Inventory List
                </a>
            </div>
        </div>
    </div>
</body>
</html>
