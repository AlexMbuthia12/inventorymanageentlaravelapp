<?php

namespace App\Http\Controllers;

use App\Models\Item; // Assuming you have an Item model
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $items = Item::all(); // Fetch all items from the database
        return view('welcome', compact('items')); // Pass items to the view
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('items.create'); // Return the view for creating an item
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Item::create($request->all()); // Create a new item
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    // Display the specified resource
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Return the view for showing an item
    }

    // Show the form for editing the specified resource
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Return the view for editing an item
    }

    // Update the specified resource in storage
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item->update($request->all()); // Update the item
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Item $item)
    {
        $item->delete(); // Delete the item
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}