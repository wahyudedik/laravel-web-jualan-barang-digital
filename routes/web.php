<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // resource route for users
    //   GET|HEAD        dashboard/users ...................................................................... users.index › UserController@index 
    //   POST            dashboard/users ...................................................................... users.store › UserController@store 
    //   GET|HEAD        dashboard/users/create ............................................................. users.create › UserController@create 
    //   GET|HEAD        dashboard/users/{user} ................................................................. users.show › UserController@show 
    //   PUT|PATCH       dashboard/users/{user} ............................................................. users.update › UserController@update 
    //   DELETE          dashboard/users/{user} ........................................................... users.destroy › UserController@destroy 
    //   GET|HEAD        dashboard/users/{user}/edit ............................................................ users.edit › UserController@edit 
    Route::resource('/dashboard/users', UserController::class);

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
