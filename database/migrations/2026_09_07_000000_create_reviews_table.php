<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 100)->default('Anonymous');
            $table->unsignedTinyInteger('rating');
            $table->text('comment');
            $table->string('product_type', 50);
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->index(['product_type', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
