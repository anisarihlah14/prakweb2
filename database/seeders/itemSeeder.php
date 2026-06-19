<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'name' => 'Laptop',
            'price' => 10000000,
            'category_id' => 1,
        ]);

        Item::create([
            'name' => 'Mouse',
            'price' => 150000,
            'category_id' => 1,
        ]);

        Item::create([
            'name' => 'Keyboard',
            'price' => 350000,
            'category_id' => 2,
        ]);

        Item::create([
            'name' => 'Monitor',
            'price' => 2500000,
            'category_id' => 2,
        ]);
    }
}