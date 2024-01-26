<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSale extends Component
{
    public $selling_price = '';

    #[Validate('required|numeric|min:1')]
    public int $quantity = 1;

    #[Validate('required|numeric|min:0.1')]
    public float $unit_cost = 0;

    public function updated($name, $value)
    {
        $product = Product::firstOrFail();
        $sale = new Sale(
            [
                'quantity' => $this->quantity ?? 1,
                'unit_cost' => $this->unit_cost ?? 0,
                'product_id' => $product->id,
                'profit_margin' => $product->profit_margin,
                'shipping_cost' => config('app.default_shipping_cost'),
            ]
        );
        $this->selling_price = $sale->selling_price;
    }

    public function save()
    {
        $this->validate();

        $product = Product::firstOrFail();

        Sale::create([
            'product_id' => $product->id,
            'quantity' => $this->quantity,
            'profit_margin' => $product->profit_margin,
            'shipping_cost' => config('app.default_shipping_cost'),
            'unit_cost' => $this->unit_cost,
        ]);

        $this->reset();
        $this->dispatch('sale-created');
    }

    public function render()
    {
        return view('livewire.create-sale');
    }
}
