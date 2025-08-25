<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ClassType;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        // On récupère toutes les classes avec leur id et nom
        $classes = ClassType::pluck('id', 'name')->all();

        $data = [];
        $sectionNames = ['A', 'B', 'C']; // Trois sections par classe

        foreach ($classes as $className => $classId) {
            foreach ($sectionNames as $sectionName) {
                $data[] = [
                    'name' => $sectionName,
                    'my_class_id' => $classId,
                    'active' => 1
                ];
            }
        }

        DB::table('sections')->insert($data);
    }
}