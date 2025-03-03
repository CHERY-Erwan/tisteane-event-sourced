<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

final class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'uuid' => Str::uuid(),
                'label' => ['en' => 'Solar lamps', 'fr' => 'Lampes solaires'],
                'slug' => 'solar-lamps',
            ],
            [
                'uuid' => Str::uuid(),
                'label' => ['en' => 'Solar lids', 'fr' => 'Couvercles solaires'],
                'slug' => 'solar-lids',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
