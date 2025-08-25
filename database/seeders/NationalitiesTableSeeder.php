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
            'Gambien',
            'Burkinabé',
            'Mauritanien',
            'Français',
            'Américain',
            'Chinois',
            'Autre' // optionnel pour les nationalités diverses
        ];

        foreach ($nationals as $n) {
            Nationality::create(['name' => $n]);
        }
    }
}