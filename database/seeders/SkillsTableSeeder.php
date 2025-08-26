<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('skills')->delete();
        $this->createSkills();
    }

    protected function createSkills()
    {
        $types = ['AF', 'PS']; // AF = Affectif, PS = Psychomoteur

        $d = [
            // Compétences affectives (AF)
            ['name' => 'Ponctualité', 'skill_type' => $types[0]],
            ['name' => 'Propreté / Soins personnels', 'skill_type' => $types[0]],
            ['name' => 'Honnêteté', 'skill_type' => $types[0]],
            ['name' => 'Fiabilité', 'skill_type' => $types[0]],
            ['name' => 'Relation avec les autres', 'skill_type' => $types[0]],
            ['name' => 'Politesse', 'skill_type' => $types[0]],
            ['name' => 'Discipline', 'skill_type' => $types[0]],
            ['name' => 'Participation en classe', 'skill_type' => $types[0]],
            ['name' => 'Respect des enseignants', 'skill_type' => $types[0]],

            // Compétences psychomotrices (PS)
            ['name' => 'Écriture / Calligraphie', 'skill_type' => $types[1]],
            ['name' => 'Éducation physique et sport', 'skill_type' => $types[1]],
            ['name' => 'Dessin & Arts plastiques', 'skill_type' => $types[1]],
            ['name' => 'Peinture', 'skill_type' => $types[1]],
            ['name' => 'Travaux pratiques / Bricolage', 'skill_type' => $types[1]],
            ['name' => 'Compétences musicales', 'skill_type' => $types[1]],
            ['name' => 'Créativité', 'skill_type' => $types[1]],
        ];

        DB::table('skills')->insert($d);
    }
}