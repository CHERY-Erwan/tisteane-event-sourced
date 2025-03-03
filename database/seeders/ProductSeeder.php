<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Domains\Product\Projections\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

final class ProductSeeder extends Seeder
{
    public function run()
    {
        $solarLampsCategoryId = Category::where('slug', 'solar-lamps')->value('uuid');
        $solarLidsCategoryId = Category::where('slug', 'solar-lids')->value('uuid');

        $products = [
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLampsCategoryId,
                'sku' => 'LEO',
                'slug' => 'leonardo-solar-lamp',
                'short_label' => 'Leonardo',
                'label' => ['en' => 'Leonardo Solar Lamp', 'fr' => 'Lampe Solaire Leonardo'],
                'short_description' => ['en' => 'A stylish and energy-efficient solar lamp.', 'fr' => 'Une lampe solaire élégante et économe en énergie.'],
                'description' => ['en' => 'A stylish and energy-efficient solar lamp.', 'fr' => 'Une lampe solaire élégante et économe en énergie.'],
                'stock' => 10,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLampsCategoryId,
                'sku' => 'PDL',
                'slug' => 'pot-de-lait-solar-lamp',
                'short_label' => 'Pot de lait',
                'label' => ['en' => 'Pot de lait Solar Lamp', 'fr' => 'Lampe Solaire Pot de lait'],
                'short_description' => ['en' => 'A concentrated light source meant to illuminate your spaces.', 'fr' => 'Un concentré de lumière pour illuminer vos espaces.'],
                'description' => ['en' => 'A concentrated light source meant to illuminate your spaces.', 'fr' => 'Un concentré de lumière pour illuminer vos espaces.'],
                'stock' => 25,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLampsCategoryId,
                'sku' => 'LP',
                'slug' => 'le-parfait-solar-lamp',
                'short_label' => 'Le Parfait',
                'label' => ['en' => 'Le Parfait Solar Lamp', 'fr' => 'Lampe Solaire Le Parfait'],
                'short_description' => ['en' => 'A touch of elegance and energy efficiency.', 'fr' => 'Une touche d\'élégance et d\'économie d\'énergie.'],
                'description' => ['en' => 'A touch of elegance and energy efficiency.', 'fr' => 'Une touche d\'élégance et d\'économie d\'énergie.'],
                'stock' => 75,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLidsCategoryId,
                'sku' => 'CST',
                'slug' => 'solar-lid-t082',
                'short_label' => 'Couvercle T082',
                'label' => ['en' => 'Solar Lid T082', 'fr' => 'Couvercle Solaire T082'],
                'short_description' => ['en' => 'A solar lid that fits your T082 jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux T082.'],
                'description' => ['en' => 'A solar lid that fits your T082 jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux T082.'],
                'stock' => 55,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLidsCategoryId,
                'sku' => 'CSLP',
                'slug' => 'solar-lid-le-parfait',
                'short_label' => 'Couvercle Le Parfait',
                'label' => ['en' => 'Solar Lid Le Parfait', 'fr' => 'Couvercle Solaire Le Parfait'],
                'short_description' => ['en' => 'A solar lid that fits your Le Parfait jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux Le Parfait.'],
                'description' => ['en' => 'A solar lid that fits your Le Parfait jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux Le Parfait.'],
                'stock' => 100,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::new()
                ->writeable()
                ->create($product);
        }
    }
}
