<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('login');

Route::controller(UserController::class)->group(function(){
    Route::post('/login', 'store')->name('user.store');
    Route::get('/logout', 'destroy')->name('user.destroy');
    Route::get('/cadaster', 'create')->name('user.create');
    Route::post('/cadaster/in', 'update')->name('user.update');
});

Route::resource('products', ProductController::class);