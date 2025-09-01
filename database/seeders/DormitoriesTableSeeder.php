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
            ['name' => 'Internat Primaire'],
            ['name' => 'Internat Collège'],
            ['name' => 'Internat Lycée'],
            ['name' => 'Internat Excellence'],
        ];

        DB::table('dormitories')->insert($data);
    }
}
