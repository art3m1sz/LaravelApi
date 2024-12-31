<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Return all products with their categories
        return response()->json(User::all());
    }

    public function show($id)
{
    // Debug: Log the ID to ensure it's passed correctly
    // \Log::info("Looking for user with ID: $id");

    $user = User::find($id);

    // Debug: Check the user found or not
    // \Log::info($user);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string',
            'user_level' => 'required|integer',
        ]);

        $user = User::create($validated);
        return response()->json($user, 201);
    }


    public function update(Request $request, $id)
    {
        // Find the product by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_password' => 'required|string',
            'user_level' => 'required|integer',
        ]);

        // Update the product
        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy($id)
    {
        // Find the product by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete the product
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
