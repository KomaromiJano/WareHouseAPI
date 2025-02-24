<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\StockMovement;

class InventorySeeder extends Seeder
{
    public function run()
    {
        // Ellenőrizzük, hogy van-e már adat a táblákban
        if (Supplier::count() > 0) {
            return;
        }

        // Beszállítók hozzáadása
        $suppliers = [
            ['name' => 'Tech Distributors', 'contact_person' => 'Kovács Péter', 'phone' => '123-456-789'],
            ['name' => 'Office Solutions Ltd.', 'contact_person' => 'Nagy Anna', 'phone' => '987-654-321']
        ];
        
        foreach ($suppliers as $supplierData) {
            Supplier::create($supplierData);
        }

        // Termékek hozzáadása
        $products = [
            ['name' => 'Dell Laptop', 'category' => 'Electronics', 'stock' => 50, 'supplier_id' => 1],
            ['name' => 'HP Printer', 'category' => 'Office Equipment', 'stock' => 20, 'supplier_id' => 2],
            ['name' => 'Wireless Mouse', 'category' => 'Accessories', 'stock' => 100, 'supplier_id' => 1],
            ['name' => 'Office Chair', 'category' => 'Furniture', 'stock' => 10, 'supplier_id' => 2]
        ];
        
        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Készletmozgások hozzáadása
        $stockMovements = [
            ['product_id' => 1, 'type' => 'in', 'quantity' => 20, 'date' => now()->subDays(10)],
            ['product_id' => 2, 'type' => 'out', 'quantity' => 5, 'date' => now()->subDays(5)],
            ['product_id' => 3, 'type' => 'in', 'quantity' => 50, 'date' => now()->subDays(3)],
            ['product_id' => 4, 'type' => 'out', 'quantity' => 2, 'date' => now()->subDays(1)]
        ];
        
        foreach ($stockMovements as $movementData) {
            StockMovement::create($movementData);
        }
    }
}