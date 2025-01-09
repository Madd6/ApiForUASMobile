<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Carts::all();
        return response()->json([
            'status' => true,
            'message' => 'Carts retrieved successfully',
            'data' => $carts
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|unique:carts,id',
            'name' => 'required',
            'image' => 'required',
            'amount' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
            'weight' => 'required|numeric|gt:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }
        // dd($request->all());
        $carts = Carts::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product added to cart successfully',
            'data' => $carts,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $cart = Carts::find($id);
        if (!$cart) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Product retrieved successfully',
            'data' => $cart
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'image' => 'required',
            'amount' => 'required|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
            'weight' => 'required|numeric|gt:0',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }
        $cart = Carts::find($id);
        if (!$cart) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $cart->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $cart
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $cart = Carts::find($id);
        if (!$cart) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $cart->delete();
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
