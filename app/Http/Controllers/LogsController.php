<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        // Return all logs
        return response()->json(Logs::all());
    }

    public function show($id)
{
    // Debug: Log the ID to ensure it's passed correctly
    // \Log::info("Looking for product with ID: $id");

    $logs = Logs::find($id);

    // Debug: Check the product found or not
    // \Log::info($product);

    if (!$logs) {
        return response()->json(['message' => 'Logs not found'], 404);
    }

    return response()->json($logs);
}


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_user' => 'required|integer|exists:user,id_user',
            'action' => 'required|string|max:255',
        ]);
        

        // Create a new logs
        $logs = Logs::create($request->all());

        return response()->json($logs, 201);
    }

    public function update(Request $request, $id)
    {
        // Find the logs by ID
        $logs = Logs::find($id);

        if (!$logs) {
            return response()->json(['message' => 'Logs not found'], 404);
        }

        // Validate the request data
        $request->validate([
            'id_user' => 'required|integer|exists:user,id_user',
            'action' => 'required|string|max:255',
        ]);

        // Update the product
        $logs->update($request->all());

        return response()->json($logs);
    }

    public function destroy($id)
    {
        // Find the product by ID
        $logs = Logs::find($id);

        if (!$logs) {
            return response()->json(['message' => 'Logs not found'], 404);
        }

        // Delete the product
        $logs->delete();

        return response()->json(['message' => 'Logs deleted successfully']);
    }
}
