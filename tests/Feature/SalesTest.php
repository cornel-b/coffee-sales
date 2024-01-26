<?php

namespace Tests\Feature;

use App\Livewire\SaleList;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SalesTest extends TestCase
{
    use RefreshDatabase;

    public function test_sale_list_returns_correct_row_count()
    {
        Product::factory()->create();
        Sale::factory(10)->create();

        Livewire::test(SaleList::class)
            ->assertViewHas('sales', function ($sales) {
                return count($sales) == 10;
            });
    }
}
