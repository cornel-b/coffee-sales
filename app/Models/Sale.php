<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    public $fillable = ['product_id', 'quantity', 'unit_cost', 'profit_margin', 'shipping_cost'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function sellingPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->quantity * $this->unit_cost) / (1 - $this->profit_margin) + $this->shipping_cost,
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
            'profit_margin' => $this->profit_margin,
            'shipping_cost' => $this->shipping_cost,
            'selling_price' => $this->selling_price,
        ];
    }
}
