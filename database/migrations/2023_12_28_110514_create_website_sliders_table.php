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
        Schema::create('website_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image');
            $table->text('banner')->nullable();
            $table->string('slogan')->nullable();
            $table->string('meta')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_sliders');
    }
};