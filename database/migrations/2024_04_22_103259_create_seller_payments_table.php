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
        Schema::create('seller_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('payment_method');
            $table->string('account_holder_name')->nullable();
            $table->bigInteger('account_number');
            $table->bigInteger('withdrawal_amount');
            $table->string('branch')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_payments');
    }
};
