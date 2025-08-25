<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            // Maternelle
            ['name' => 'Petite Section', 'code' => 'PS'],
            ['name' => 'Moyenne Section', 'code' => 'MS'],
            ['name' => 'Grande Section', 'code' => 'GS'],

            // Primaire
            ['name' => '1ère Année', 'code' => '1A'],
            ['name' => '2ème Année', 'code' => '2A'],
            ['name' => '3ème Année', 'code' => '3A'],
            ['name' => '4ème Année', 'code' => '4A'],
            ['name' => '5ème Année', 'code' => '5A'],
            ['name' => '6ème Année', 'code' => '6A'],

            // Collège
            ['name' => '7ème Année', 'code' => '7A'],
            ['name' => '8ème Année', 'code' => '8A'],
            ['name' => '9ème Année', 'code' => '9A'], 
            ['name' => '10ème Année', 'code' => '10A'],// BEPC

            // Lycée
            ['name' => '11ème Année - Série Scientifique', 'code' => '11AS'],
            ['name' => '11ème Année - Série Littéraire',   'code' => '11AL'],
            ['name' => '12ème Année - Série Scientifique', 'code' => '12AS'],
            ['name' => '12ème Année - Série Littéraire',   'code' => '12AL'],
            ['name' => 'Terminale Sciences Mathématiques',  'code' => 'TSM'],
            ['name' => 'Terminale Sciences Expérimentales', 'code' => 'TSE'],
            ['name' => 'Terminale Sciences Sociales',       'code' => 'TSS'],


        ];

        DB::table('class_types')->insert($data);
    }
}