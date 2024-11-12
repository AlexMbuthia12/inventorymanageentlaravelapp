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