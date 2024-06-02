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
        Schema::create('product_queries_replies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('queries_id');
            $table->bigInteger('product_id');
            $table->bigInteger('user_id');
            $table->text('reply');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_queries_replies');
    }
};