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
        Schema::create('seller_shop_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id');
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('icon')->nullable();
            $table->string('slogan')->nullable();
            $table->string('meta')->nullable();
            $table->string('meta_description')->nullable();
            $table->longText('about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_shop_settings');
    }
};
