<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\StockMovementController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('products', ProductController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::get('suppliers/{supplier}/products', [SupplierController::class, 'products']);
Route::apiResource('stock-movements', StockMovementController::class);
