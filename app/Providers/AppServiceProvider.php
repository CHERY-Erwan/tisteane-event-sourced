<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domains\Bundle\Projections\Bundle;
use App\Domains\Product\Projections\Product;
use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'product' => Product::class,
            'product_variant' => ProductVariant::class,
            'bundle' => Bundle::class,
        ]);
    }
}
