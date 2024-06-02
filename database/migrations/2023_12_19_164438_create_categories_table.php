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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type');
            $table->integer('parent_id');
            $table->integer('level');
            $table->string('orderNumber')->nullable();
            $table->text('banner')->nullable();
            $table->text('icon')->nullable();
            $table->text('cover')->nullable();
            $table->string('meta')->nullable();
            $table->text('metaDescription')->nullable();
            $table->tinyInteger('featured_status')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
