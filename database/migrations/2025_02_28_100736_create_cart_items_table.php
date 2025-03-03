<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('cart_uuid');
            $table->uuid('product_variant_uuid')->nullable();
            $table->uuid('bundle_uuid')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('cart_uuid')
                ->references('uuid')
                ->on('carts')
                ->onDelete('cascade');

            $table->foreign('product_variant_uuid')
                ->references('uuid')
                ->on('product_variants')
                ->onDelete('cascade');

            $table->foreign('bundle_uuid')
                ->references('uuid')
                ->on('bundles')
                ->onDelete('cascade');

            $table->unique(['cart_uuid', 'product_variant_uuid']);
            $table->unique(['cart_uuid', 'bundle_uuid']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
