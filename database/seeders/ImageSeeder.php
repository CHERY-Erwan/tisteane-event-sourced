<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domains\Product\Projections\Product;
use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Database\Seeder;

final class ImageSeeder extends Seeder
{
    public function run()
    {
        $product = Product::firstWhere('sku', 'LEO');
        $this->seedImage($product, 'app/public/products-images/leonardo.webp', 'homepage_attachment');

        $this->seedImage($product, 'app/public/products-images/leonardo_size_1.jpg', 'size_u_attachment');
        $this->seedImage($product, 'app/public/products-images/leonardo_size_2.jpg', 'size_u_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'LIGHT-GREEN');
        $this->seedImage($productVariant, 'app/public/products-images/leonardo_light_green.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'AZURE-BLUE');
        $this->seedImage($productVariant, 'app/public/products-images/leonardo_azure_blue.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'ANTIQUE-PINK');
        $this->seedImage($productVariant, 'app/public/products-images/leonardo_antique_pink.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'MELON');
        $this->seedImage($productVariant, 'app/public/products-images/leonardo_melon.jpg', 'color_attachment');

        $product = Product::firstWhere('sku', 'PDL');
        $this->seedImage($product, 'app/public/products-images/pot_de_lait.webp', 'homepage_attachment');

        $product = Product::firstWhere('sku', 'LP');
        $this->seedImage($product, 'app/public/products-images/le_parfait.webp', 'homepage_attachment');
    }

    private function seedImage(Product|ProductVariant $product, string $path, string $collection)
    {
        $product->addMedia(storage_path($path))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection($collection);
    }
}
