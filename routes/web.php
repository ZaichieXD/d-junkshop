<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Route::prefix('home')->group(function (){
    Route::get('/', [ProductController::class, 'home'])->name('user.home');
    Route::put('/{id}', [ProductController::class, 'purchase'])->name('user.purchase');
});

// Route::get('/inventory', function () {
//     return view('admin_views.inventory');
// })->middleware(['auth', 'verified'])->name('inventory');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/inventory', [ProductController::class, 'index'])->name('admin.inventory');
    Route::put('/inventory/{id}', [ProductController::class, 'update'])->name('admin.inventory.update');
    Route::get('/inventory/create', [ProductController::class, 'create'])->name('admin.inventory.create');
    Route::post('/inventory', [ProductController::class, 'store'])->name('admin.inventory.store');
    Route::delete('/inventory/{id}', [ProductController::class, 'destroy'])->name('admin.inventory.destroy');


})->name('admin.inventory');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
