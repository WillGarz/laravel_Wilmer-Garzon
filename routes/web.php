<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

