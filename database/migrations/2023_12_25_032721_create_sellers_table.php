<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('shop_name',255)->unique();
            $table->string('address',255);
            $table->boolean('terms_policy')->default(0);
            $table->string('verify_field',255);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
