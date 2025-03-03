<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domains\Product\Projections\ProductAttribute;
use App\Domains\Product\Projections\ProductVariant;
use Illuminate\Database\Seeder;

final class ProductAttributeSeeder extends Seeder
{
    public function run()
    {
        $attributes = [
            [
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Battery Life',
                'value' => '10 hours',
            ],
            [
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Material',
                'value' => 'Bamboo',
            ],
            [
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-LIGHT-GREEN')->first()->uuid,
                'key' => 'Material',
                'value' => 'Recycled Plastic',
            ],
            [
                'product_variant_uuid' => ProductVariant::where('sku', 'LEO-U-ANTIQUE-PINK')->first()->uuid,
                'key' => 'Wood Type',
                'value' => 'Oak',
            ],
        ];

        foreach ($attributes as $attribute) {
            ProductAttribute::new()
                ->writeable()
                ->create($attribute);
        }
    }
}
