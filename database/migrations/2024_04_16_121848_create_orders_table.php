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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('order_code')->unique();
            $table->tinyInteger('order_status')->default(0);
            $table->date('order_date');
            $table->string('phone');
            $table->double('total_price',10,2)->default(0);
            $table->double('total_shipping',10,2)->default(0);
            $table->double('payment_amount',10,2)->default(0);
            $table->string('payment_method');
            $table->tinyInteger('payment_status')->default(0);
            $table->date('payment_date')->nullable();
            $table->tinyInteger('manual_payment_status')->default(0);
            $table->string('manual_payment')->default('cash_on');
            $table->text('payment_details')->nullable();
            $table->bigInteger('deliveryBoy_id')->nullable();
            $table->bigInteger('deliveryBoy_pickup')->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->date('delivery_date')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->double('coupon_discount',10,2)->default(0);
            $table->integer('commission')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
