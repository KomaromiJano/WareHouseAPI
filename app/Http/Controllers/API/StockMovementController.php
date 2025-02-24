<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        return StockMovement::with('product')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer',
            'date' => 'required|date',
        ]);

        return StockMovement::create($validated);
    }

    public function show(string $id)
    {
        return StockMovement::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $stockMovement = StockMovement::findOrFail($id);
        $validated = $request->validate([
            'product_id' => 'exists:products,id',
            'type' => 'in:in,out',
            'quantity' => 'integer',
            'date' => 'date',
        ]);

        $stockMovement->update($validated);
        return $stockMovement;
    }

    public function destroy(string $id)
    {
        $stockMovement = StockMovement::findOrFail($id);
        $stockMovement->delete();
        return response()->json(null, 204);
    }
}