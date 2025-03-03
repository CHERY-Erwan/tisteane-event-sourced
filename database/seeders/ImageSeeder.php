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
        $this->seedImage($product, 'app/public/leonardo.jpg', 'homepage_attachment');

        $this->seedImage($product, 'app/public/leonardo_size_1.jpg', 'size_u_attachment');
        $this->seedImage($product, 'app/public/leonardo_size_2.jpg', 'size_u_attachment');
        $this->seedImage($product, 'app/public/leonardo_size_3.jpg', 'size_u_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'LIGHT-GREEN');
        $this->seedImage($productVariant, 'app/public/leonardo_light_green.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'AZURE-BLUE');
        $this->seedImage($productVariant, 'app/public/leonardo_azure_blue.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'ANTIQUE-PINK');
        $this->seedImage($productVariant, 'app/public/leonardo_antique_pink.jpg', 'color_attachment');

        $productVariant = $product->variants->firstWhere('color.code', 'MELON');
        $this->seedImage($productVariant, 'app/public/leonardo_melon.jpg', 'color_attachment');

        $product = Product::firstWhere('sku', 'PDL');
        $this->seedImage($product, 'app/public/pot_de_lait.jpg', 'homepage_attachment');

        $product = Product::firstWhere('sku', 'LP');
        $this->seedImage($product, 'app/public/le_parfait.jpg', 'homepage_attachment');
    }

    private function seedImage(Product|ProductVariant $product, string $path, string $collection)
    {
        $product->addMedia(storage_path($path))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection($collection);
    }
}
