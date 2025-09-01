<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LgasTableSeeder extends Seeder
{
    public function run()
    {
        // Supprime toutes les entrées existantes pour éviter les doublons
        DB::table('lgas')->truncate();

        // Liste des villes/préfectures par région
        $lgas = [
            // Conakry
            ['state_id' => 1, 'name' => 'Kaloum'],
            ['state_id' => 1, 'name' => 'Dixinn'],
            ['state_id' => 1, 'name' => 'Ratoma'],
            ['state_id' => 1, 'name' => 'Matoto'],
            ['state_id' => 1, 'name' => 'Matam'],

            // Boké
            ['state_id' => 2, 'name' => 'Boké'],
            ['state_id' => 2, 'name' => 'Boffa'],
            ['state_id' => 2, 'name' => 'Fria'],
            ['state_id' => 2, 'name' => 'Gaoual'],
            ['state_id' => 2, 'name' => 'Koundara'],

            // Kindia
            ['state_id' => 3, 'name' => 'Kindia'],
            ['state_id' => 3, 'name' => 'Coyah'],
            ['state_id' => 3, 'name' => 'Forécariah'],
            ['state_id' => 3, 'name' => 'Télimélé'],
            ['state_id' => 3, 'name' => 'Pita'],

            // Labé
            ['state_id' => 4, 'name' => 'Labé'],
            ['state_id' => 4, 'name' => 'Lélouma'],
            ['state_id' => 4, 'name' => 'Koubia'],
            ['state_id' => 4, 'name' => 'Tougué'],
            ['state_id' => 4, 'name' => 'Boké'],

            // Mamou
            ['state_id' => 5, 'name' => 'Mamou'],
            ['state_id' => 5, 'name' => 'Dalaba'],
            ['state_id' => 5, 'name' => 'Pita'],

            // Faranah
            ['state_id' => 6, 'name' => 'Faranah'],
            ['state_id' => 6, 'name' => 'Dabola'],
            ['state_id' => 6, 'name' => 'Dinguiraye'],
            ['state_id' => 6, 'name' => 'Dissahaya'],

            // Kankan
            ['state_id' => 7, 'name' => 'Kankan'],
            ['state_id' => 7, 'name' => 'Kérouané'],
            ['state_id' => 7, 'name' => 'Kouroussa'],
            ['state_id' => 7, 'name' => 'Siguiri'],
            ['state_id' => 7, 'name' => 'Mandiana'],

            // Nzérékoré
            ['state_id' => 8, 'name' => 'Nzérékoré'],
            ['state_id' => 8, 'name' => 'Yomou'],
            ['state_id' => 8, 'name' => 'Macenta'],
            ['state_id' => 8, 'name' => 'Guéckédou'],
            ['state_id' => 8, 'name' => 'Lola'],
            ['state_id' => 8, 'name' => 'Beyla'],
        ];

        // Insère les données dans la table
        DB::table('lgas')->insert($lgas);
    }
}