<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('qty');
            $table->decimal('price', 8,2);
            $table->decimal('row_total', 8,2);
            $table->string('size_id')->nullable();
            $table->string('color_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('variant_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
