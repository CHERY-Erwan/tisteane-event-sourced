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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('category_uuid')->nullable();
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->string('short_label')->nullable();
            $table->json('label')->nullable();
            $table->json('short_description')->nullable();
            $table->json('description')->nullable();
            $table->integer('stock')->default(0)->comment('Stock handled by product and not by variant');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_uuid')->references('uuid')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
