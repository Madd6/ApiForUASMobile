<?php

use App\Http\Controllers\Api\CartsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/carts', function () {
    return response()->json(['message' => 'Carts endpoint working']);
});
