<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return Supplier::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'contact_person' => 'required|string',
            'phone' => 'required|string',
        ]);

        return Supplier::create($validated);
    }

    public function show(string $id)
    {
        return Supplier::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string',
            'contact_person' => 'string',
            'phone' => 'string',
        ]);

        $supplier->update($validated);
        return $supplier;
    }

    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return response()->json(null, 204);
    }

    public function products(Supplier $supplier)
    {
        return $supplier->products;
    }
}