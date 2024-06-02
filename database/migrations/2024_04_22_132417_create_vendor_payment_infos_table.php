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
        Schema::create('vendor_payment_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->text('payment_method')->nullable();
            $table->text('account_holder_name')->nullable();
            $table->bigInteger('account_number')->unique()->nullable();
            $table->text('branch')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_payment_infos');
    }
};
