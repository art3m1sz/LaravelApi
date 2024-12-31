<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Return all categories as a JSON response
        return response()->json(Category::all());
    }

    public function show($id)
    {
        // Find a specific category by id
        $category = Category::find($id);

        // If the category doesn't exist, return a 404 response
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Create a new category
        $category = Category::create($request->all());

        // Return the newly created category
        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Validate the updated data
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        // Update the category
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        // Find the category by ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // Delete the category
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}

