<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

// // Home route (optional)
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [itemController::class, 'index'])->name('items.index');
// Resource route for items
Route::resource('items', ItemController::class);
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
