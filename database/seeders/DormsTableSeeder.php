<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dorms')->delete();

        $data = [
            ['name' => 'Internat Primaire'],
            ['name' => 'Internat Collège'],
            ['name' => 'Internat Lycée'],
            ['name' => 'Internat Excellence'],
        ];

        DB::table('dorms')->insert($data);
    }
}