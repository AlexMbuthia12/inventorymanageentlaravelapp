<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route::get('/', function () {
//     return view('welcome');
// });
// Landing page route
Route::get('/', function () {
    return view('landing');
})->name('landing');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// // Home route (optional)
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    // Route::get('/welcome', function () {return view('welcome');})->name('welcome');
    Route::get('/welcome', [itemController::class, 'index'])->name('welcome');
    
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/welcome', function () {
//         // Assuming you want to pass items to the welcome view
//         $items = app(itemController::class)->index(); // or however you retrieve items
//         return view('welcome', compact('items'));
//     })->name('welcome');
// });


// Resource route for items
Route::resource('items', ItemController::class);
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
require __DIR__.'/auth.php';
