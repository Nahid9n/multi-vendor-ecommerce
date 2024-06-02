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
        Schema::create('seller_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->double('amount');
            $table->integer('product_upload');
            $table->integer('duration');
            $table->text('package_logo')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_packages');
    }
};
