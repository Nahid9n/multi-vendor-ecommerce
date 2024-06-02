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
        Schema::create('delivery_boy_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('pending_order')->default(0);
            $table->bigInteger('pickup_order')->default(0);
            $table->bigInteger('complete_order')->default(0);
            $table->bigInteger('request_cancel_order')->default(0);
            $table->bigInteger('cancel_order')->default(0);
            $table->bigInteger('earning')->default(0);
            $table->bigInteger('balance')->default(0);
            $table->bigInteger('total_withdraw')->default(0);
            $table->bigInteger('total_collection')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_boy_orders');
    }
};
