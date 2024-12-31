<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Return all products with their categories
        return response()->json(Product::all());
    }

    public function show($id)
{
    // Debug: Log the ID to ensure it's passed correctly
    \Log::info("Looking for product with ID: $id");

    $product = Product::find($id);

    // Debug: Check the product found or not
    \Log::info($product);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json($product);
}


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'stock' => 'required|integer',
            'id_category' => 'required|integer|exists:category,id_category',
        ]);

        // Create a new product
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
            'stock' => 'required|integer',
            'id_category' => 'required|integer|exists:category,id_category',
        ]);

        // Update the product
        $product->update($request->all());

        return response()->json($product);
    }

    public function destroy($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Delete the product
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
