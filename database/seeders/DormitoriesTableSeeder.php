<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dormitories')->delete();

        $data = [
            ['name' => 'Internat Garçons'],
            ['name' => 'Internat Filles'],
            ['name' => 'Internat Primaire'],
            ['name' => 'Internat Collège'],
            ['name' => 'Internat Lycée'],
            ['name' => 'Internat Espoir'],       // valeur inspirante
            ['name' => 'Internat Amitié'],      // valeur sociale
            ['name' => 'Internat Excellence'],  // valeur éducative
        ];

        DB::table('dormitories')->insert($data);
    }
}
