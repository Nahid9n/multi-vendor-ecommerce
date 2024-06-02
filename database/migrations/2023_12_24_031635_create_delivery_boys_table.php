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
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();
            $table->bigInteger('user_id');
            $table->string('name');
            $table->string('designation')->nullable();
            $table->text('image')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('blood')->nullable();
            $table->string('gender')->nullable();
            $table->string('date')->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('biography')->nullable();
            $table->string('experience')->nullable();
            $table->string('facebook')->unique()->nullable();
            $table->string('twitter')->unique()->nullable();
            $table->string('linkedIn')->unique()->nullable();
            $table->text('website')->nullable();
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
        Schema::dropIfExists('delivery_boys');
    }
};
