<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/users', function () {
        return view('users');
    })->name('user');

    Route::get('/dashboard/products', function () {
        return view('products.index');
    })->name('product');

    Route::get('/dashboard/customers', function () {
        return view('customers.index');
    })->name('customer');
    Route::get('/dashboard/transactions', function () {
        return view('transactions.index');
    })->name('transaction');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
