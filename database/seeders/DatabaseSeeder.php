<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Sales Agent',
            'email' => 'sales@coffee.shop',
        ]);

        Product::create([
            'name' => 'Gold Coffee',
            'profit_margin' => '0.25',
        ]);

        Product::create([
            'name' => 'Arabic Coffee',
            'profit_margin' => '0.15',
        ]);
    }
}
