<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationals = [
            'Guinéen',
            'Sénégalais',
            'Malien',
            'Ivoirien',
            'Libérien',
            'Sierra-Léonais',
            // Pays non limitrophes mais proches par la CEDEAO
            'Gambien',
            'Burkinabé',
            'Mauritanien',
            // Autres nationalités souvent présentes
            'Français',
            'Américain',
            'Chinois',
            'Autre',
        ];

        foreach ($nationals as $n) {
            Nationality::create(['name' => $n]);
        }
    }
}
