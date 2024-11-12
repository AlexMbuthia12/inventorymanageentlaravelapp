<!-- resources/views/items/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
</head>
<body>

<h1>Create New Item</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <label for="name">Item Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
    
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>
    
    <button type="submit">Create Item</button>
</form>

<a href="{{ route('items.index') }}">Back to Inventory List</a>

</body>
</html>