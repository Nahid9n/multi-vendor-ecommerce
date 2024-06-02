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
        Schema::create('seller_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('total_review')->default(0);
            $table->integer('customer_review')->default(0);
            $table->tinyInteger('shipping_seed')->nullable();
            $table->tinyInteger('communication')->nullable();
            $table->tinyInteger('customer_service')->nullable();
            $table->tinyInteger('return_policy')->nullable();
            $table->tinyInteger('package_policy')->nullable();
            $table->tinyInteger('package_quantity')->nullable();
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_reviews');
    }
};
