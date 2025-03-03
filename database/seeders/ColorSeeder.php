<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

final class ColorSeeder extends Seeder
{
    public function run()
    {
        Color::create(['code' => 'BLACK', 'label' => ['en' => 'Black', 'fr' => 'Noir'], 'hex_code' => '#37393B']); // RAL_9011
        Color::create(['code' => 'LIGHT-GREEN', 'label' => ['en' => 'Light Green', 'fr' => 'Vert clair'], 'hex_code' => '#7AB9B4']); // RAL_6027
        Color::create(['code' => 'AZURE-BLUE', 'label' => ['en' => 'Azure Blue', 'fr' => 'Bleu azure'], 'hex_code' => '#025669']); // RAL_5009
        Color::create(['code' => 'ANTIQUE-PINK', 'label' => ['en' => 'Antique Pink', 'fr' => 'Rose antique'], 'hex_code' => '#d47479']); // RAL_3014
        Color::create(['code' => 'MELON', 'label' => ['en' => 'Melon', 'fr' => 'Melon'], 'hex_code' => '#DA6E00']); // RAL_2000
    }
}
