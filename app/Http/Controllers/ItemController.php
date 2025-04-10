<?php

namespace App\Http\Controllers;

use App\Models\Item; // Assuming you have an Item model
use Illuminate\Http\Request;
use App\Models\Sale;


class ItemController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $items = Item::all()->map(function ($item) {
            $item->price = $item->quantity * $item->unit_price; // Recalculate price
            $item->total_unit_price = $item->quantity * $item->unit_price; // Recalculate total unit price
            return $item;
        });
    
        $totalInventoryPrice = $items->sum('price'); // Sum of all item prices
        // Calculate total sales
        $totalSales = Sale::sum('total_price');
        $sales = Sale::with('item')->get();

        return view('welcome', compact('items', 'totalInventoryPrice','totalSales'));
    }

    public function create()
    {
        return view('items.create'); // Return the view for creating an item
    }

    // Store a newly created resource in storage
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:0',
        'unit_price' => 'required|numeric|min:0',
    ]);

    $price = $request->quantity * $request->unit_price;

    Item::create([
        'name' => $request->name,
        'quantity' => $request->quantity,
        'unit_price' => $request->unit_price,
        'price' => $price,
    ]);

    return redirect()->route('items.index')->with('success', 'Item created successfully!');
}
    // Display the specified resource
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Return the view for showing an item
    }
    // Remove the specified resource from storage
    public function destroy(Item $item)
    {
        $item->delete(); // Delete the item
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
// Show the form for editing the specified resource
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:0',
        'unit_price' => 'required|numeric|min:0', // Ensure unit price is validated
    ]);

    $item = Item::findOrFail($id);
    $item->quantity = $request->quantity;
    $item->unit_price = $request->unit_price; // Update unit price
    $item->price = $item->quantity * $item->unit_price; // Recalculate total price
    $item->save();

    return redirect()->route('items.index')->with('success', 'Item updated successfully!');
}
}