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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->foreignId('unit_id');
            $table->string('unit_amount');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('bar_code')->unique();
            $table->double('product_price',10,2);
            $table->integer('product_stock')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_select');
            $table->string('other_image')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('product_type');
            $table->string('category_type');
            $table->integer('sales_count')->default(0);
            $table->tinyInteger('featured_status')->nullable();
            $table->tinyInteger('refund')->default(0);
            $table->string('tags')->nullable();
            $table->double('shipping_cost',10,2)->default(0);
            $table->integer('estimate_shipping_time')->nullable();
            $table->string('variant_product')->nullable();
            $table->string('attributes')->nullable();
            $table->string('choice_options')->nullable();
            $table->string('colors')->nullable();
            $table->string('file')->nullable();
            $table->string('role')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
