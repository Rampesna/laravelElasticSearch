<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::prefix('products')->group(function () {
    Route::get('index', [ProductController::class, 'index']);
    Route::post('create', [ProductController::class, 'create']);
    Route::get('show', [ProductController::class, 'show']);
    Route::put('update', [ProductController::class, 'update']);
    Route::delete('delete', [ProductController::class, 'delete']);
    Route::get('search', [ProductController::class, 'search']);
});
