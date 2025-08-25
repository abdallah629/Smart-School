<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();

        // Choisir le barème : '10' pour primaire, '20' pour secondaire
        $barème = 20; // changer à 10 si besoin

        $this->createGrades($barème);
    }

    protected function createGrades($barème)
    {
        if ($barème == 20) {
            $grades = [
                ['name' => 'A', 'mark_from' => 18, 'mark_to' => 20, 'remark' => 'Excellent'],
                ['name' => 'B', 'mark_from' => 16, 'mark_to' => 17, 'remark' => 'Très Bien'],
                ['name' => 'C', 'mark_from' => 14, 'mark_to' => 15, 'remark' => 'Bien'],
                ['name' => 'D', 'mark_from' => 12, 'mark_to' => 13, 'remark' => 'Assez Bien'],
                ['name' => 'E', 'mark_from' => 10, 'mark_to' => 11, 'remark' => 'Passable'],
                ['name' => 'F', 'mark_from' => 8,  'mark_to' => 9,  'remark' => 'Faible'],
                ['name' => 'G', 'mark_from' => 0,  'mark_to' => 7,  'remark' => 'Médiocre'],
            ];
        } else { // Barème sur 10
            $grades = [
                ['name' => 'A', 'mark_from' => 9, 'mark_to' => 10, 'remark' => 'Excellent'],
                ['name' => 'B', 'mark_from' => 8, 'mark_to' => 8.9, 'remark' => 'Très Bien'],
                ['name' => 'C', 'mark_from' => 7, 'mark_to' => 7.9, 'remark' => 'Bien'],
                ['name' => 'D', 'mark_from' => 6, 'mark_to' => 6.9, 'remark' => 'Assez Bien'],
                ['name' => 'E', 'mark_from' => 5, 'mark_to' => 5.9, 'remark' => 'Passable'],
                ['name' => 'F', 'mark_from' => 0, 'mark_to' => 4.9, 'remark' => 'Médiocre'],
            ];
        }

        DB::table('grades')->insert($grades);
    }
}