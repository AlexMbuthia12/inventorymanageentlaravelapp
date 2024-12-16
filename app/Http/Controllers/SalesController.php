<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // Create this model
use App\Models\Item;

class SalesController extends Controller
{
    //
    public function create($id)
    {
        // Retrieve the item using the given ID
        $item = Item::findOrFail($id);

        // Pass the item to the view
        return view('sales.create', compact('item'));
    }

public function store(Request $request, $itemId)
{
    // Fetch the item being sold
    $item = Item::findOrFail($itemId);
     
    // Validate the quantity
    // $request->validate([
    //     'quantity' => 'required|integer|min:1',
    // ]);
    // Validate the quantity
    $validated = $request->validate([
        'quantity' => 'required|integer|min:1|max:' . $item->quantity,
    ]);

     if ($request->quantity > $item->quantity) {
        return back()->withErrors(['quantity' => 'Not enough inventory to complete this sale.']);
    }
    // Calculate total price for the sale
    // $saleTotalPrice = $item->unit_price * $validated['quantity'];
    // Calculate Total Price
    // $totalitemsales = $request->quantity * $item->unit_price;

    // Reduce inventory
    $item->quantity -= $request->quantity;
    $item->save();

    // Record sale
    Sale::create([
        'item_id' => $item->id,
        'quantity' => $request->quantity,
        'total_price' => $request->quantity * $item->unit_price,
        'sold_at' => now(),
    ]);

    return redirect()->route('items.index')->with('success', 'Sale recorded successfully.');
    
}
public function index()
{
    $sales = Sale::with('item')->orderBy('sold_at', 'desc')->get();

    $salesByHour = $sales->groupBy(function ($sale) {
        return $sale->sold_at->format('H'); // Group by hour
    })->map(function ($hourlySales) {
        return [
            'total_sales' => $hourlySales->sum('total_price'),
            'total_quantity' => $hourlySales->sum('quantity'),
        ];
    });

    return view('sales.index', compact('sales', 'salesByHour'));
}


}


