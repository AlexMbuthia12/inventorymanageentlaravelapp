{{-- @extends('layouts.app')

@section('content') --}}
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
{{-- @endsection --}}
