<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('class_types')->truncate();

        $data = [
            ['name' => 'Maternelle', 'code' => 'maternelle'],
            ['name' => 'Primaire', 'code' => 'primaire'],
            ['name' => 'Collège', 'code' => 'college'],
            ['name' => 'Lycée', 'code' => 'lycee'],
        ];

        DB::table('class_types')->insert($data);
    }
}