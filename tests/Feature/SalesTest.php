<?php

namespace Tests\Feature;

use App\Livewire\CreateSale;
use App\Livewire\SaleList;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SalesTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Product::factory(2)->create();
    }

    public function test_sale_list_returns_correct_row_count()
    {
        Sale::factory(10)->create();

        Livewire::test(SaleList::class)
            ->assertViewHas('sales', function ($sales) {
                return count($sales) == 10;
            });
    }

    public function test_sale_form_contains_product_dropdown()
    {
        Livewire::test(CreateSale::class)
            ->assertViewHas('products', function ($products) {
                return count($products) == 2;
            });
    }

    public function test_sale_form_fields_are_required()
    {
        Livewire::test(CreateSale::class)
            ->set('quantity', '0')
            ->call('save')
            ->assertHasErrors('quantity')
            ->assertHasErrors('unit_cost');
    }

    public function test_sale_form_quantity_is_greater_than_0()
    {
        Livewire::test(CreateSale::class)
            ->set('quantity', '-1')
            ->call('save')
            ->assertHasErrors('quantity');
    }

    public function test_sale_can_be_created()
    {
        Livewire::test(SaleList::class)
            ->assertViewHas('sales', function ($sales) {
                return count($sales) == 0;
            });

        Livewire::test(CreateSale::class)
            ->set('product_id', '1')
            ->set('quantity', '1')
            ->set('unit_cost', '10')
            ->call('save')
            ->assertDispatched('sale-created')
            ->assertStatus(200);

        Livewire::test(SaleList::class)
            ->assertViewHas('sales', function ($sales) {
                return count($sales) == 1;
            });
    }

    public function test_sales_are_created_with_correct_selling_price()
    {
        Product::truncate();
        $this->seed();

        Livewire::test(CreateSale::class)
            ->set('product_id', '1')
            ->set('quantity', '1')
            ->set('unit_cost', '10')
            ->call('save')
            ->set('product_id', '1')
            ->set('quantity', '2')
            ->set('unit_cost', '20.50')
            ->call('save')
            ->set('product_id', '1')
            ->set('quantity', '5')
            ->set('unit_cost', '12')
            ->call('save');

        $sellingPrices = Sale::get()->map(fn ($sale) => number_format($sale->selling_price, 2))->toArray();
        $this->assertEquals($sellingPrices, [23.33, 64.67, 90.00]);
    }
}
