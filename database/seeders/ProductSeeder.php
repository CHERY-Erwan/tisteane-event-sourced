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
                'label' => ['en' => 'Leonardo Solar Lamp Tactile 3,7V', 'fr' => 'Lampe Solaire Leonardo Tactile 3,7V'],
                'short_description' => ['en' => 'A stylish and energy-efficient solar lamp.', 'fr' => 'Une lampe solaire élégante et économe en énergie.'],
                'description' => [
                    'en' => 'A stylish and energy-efficient solar lamp.',
                    'fr' => 'Lampe solaire nomade au design vintage, conçue pour un usage quotidien prolongé.<br><br>
                        Équipée de la fonction tactile Tistéane® : à la tombée du jour, allumez votre lampe d’un simple contact du doigt sur le panneau solaire.<br><br>
                        Elle est munie d’une anse pour être transportée et suspendue facilement.
                        <br><br>
                        La nouvelle gamme Pro Touch 3,7V offre d’excellentes performances :
                        <ul>
                            <li>- Interrupteur tactile / Variateur d’intensité 3 positions</li>
                            <li>- Intensité lumineuse jusqu’à 140 Lumens</li>
                            <li>- Jusqu’à 160 heures d’autonomie sans recharge</li>
                            <li>- Indicateur de charge</li>
                            <li>- Recharge solaire ou via port USB (temps de charge 4h - câble fourni)</li>
                            <li>- Joint étanche, bague traitée anti-UV, anse acier inoxydable</li>
                        </ul>
                        <br>
                        Caractéristiques Techniques :
                        <ul>
                            <li>- Éclairage Chaud (2,800-3000 Degré/Kelvin)</li>
                            <li>- Panneau solaire ETFE dernière génération</li>
                            <li>- Batterie lithium 3,7V – 3200 mAh</li>
                            <li>- 9 x LEDs – intensité 140 Lumens</li>
                            <li>- Poids 0,7 kg</li>
                            <li>- Dimensions 11 × 11 × 18 cm</li>
                            <li>- Contenance 0,750L</li>
                        </ul>',
                ],
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
                'label' => ['en' => 'Pot de lait Solar Lamp Tactile 3,7V', 'fr' => 'Lampe Solaire Pot de lait Tactile 3,7V'],
                'short_description' => ['en' => 'A concentrated light source meant to illuminate your spaces.', 'fr' => 'Un concentré de lumière pour illuminer vos espaces.'],
                'description' => ['en' => 'A concentrated light source meant to illuminate your spaces.', 'fr' => 'Un concentré de lumière pour illuminer vos espaces.'],
                'stock' => 25,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLampsCategoryId,
                'sku' => 'LP',
                'slug' => 'le-parfait-solar-lamp',
                'short_label' => 'Le Parfait',
                'label' => ['en' => 'Le Parfait Solar Lamp Tactile 3,7V', 'fr' => 'Lampe Solaire Le Parfait Tactile 3,7V'],
                'short_description' => ['en' => 'A touch of elegance and energy efficiency.', 'fr' => 'Une touche d\'élégance et d\'économie d\'énergie.'],
                'description' => ['en' => 'A touch of elegance and energy efficiency.', 'fr' => 'Une touche d\'élégance et d\'économie d\'énergie.'],
                'stock' => 75,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLidsCategoryId,
                'sku' => 'CST',
                'slug' => 'solar-lid-t082',
                'short_label' => 'Couvercle T082',
                'label' => ['en' => 'Solar Lid T082 Tactile 1,2V', 'fr' => 'Couvercle Solaire T082 Tactile 1,2V'],
                'short_description' => ['en' => 'A solar lid that fits your T082 jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux T082.'],
                'description' => ['en' => 'A solar lid that fits your T082 jars.', 'fr' => 'Un couvercle solaire qui s\'adapte à vos bocaux T082.'],
                'stock' => 55,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'uuid' => Str::uuid(),
                'category_uuid' => $solarLidsCategoryId,
                'sku' => 'CSLP',
                'slug' => 'solar-lid-le-parfait',
                'short_label' => 'Couvercle Le Parfait',
                'label' => ['en' => 'Solar Lid Le Parfait Tactile 1,2V', 'fr' => 'Couvercle Solaire Le Parfait Tactile 1,2V'],
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
