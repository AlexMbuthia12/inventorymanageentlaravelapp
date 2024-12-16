{{-- <!-- @extends('layouts.app') --}}

{{-- @section('content')
<div class="container">
    <h1>Create Sale for {{ $item->name }}</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" name="quantity" id="quantity" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Submit Sale</button>
    </form>
</div>
@endsection --}}


{{-- @extends('layouts.app')

@section('content') --}}
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Make Sale for {{ $item->name }}</h1>

    <form action="{{ route('sales.store', $item->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium">Quantity to Sell:</label>
            <input 
                type="number" 
                id="quantity" 
                name="quantity" 
                min="1" 
                max="{{ $item->quantity }}" 
                class="w-full mt-1 border-gray-300 rounded"
                required
            >
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Confirm Sale</button>
    </form>
</div>
{{-- @endsection --}}
