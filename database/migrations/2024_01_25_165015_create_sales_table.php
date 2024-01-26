<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable()->default(null);
            $table->integer('quantity', false, true)->defaul(0);
            $table->float('unit_cost', 4, 2);
            $table->float('profit_margin', 4, 2);
            $table->float('shipping_cost', 4, 2);
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
