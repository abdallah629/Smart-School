<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassType;
use Illuminate\Support\Facades\DB;

class MyClassesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('my_classes')->truncate();

        $ct = ClassType::pluck('id', 'code')->all();

        $data = [
            // Maternelle
            ['name' => 'Petite Section', 'class_type_id' => $ct['maternelle']],
            ['name' => 'Moyenne Section', 'class_type_id' => $ct['maternelle']],
            ['name' => 'Grande Section', 'class_type_id' => $ct['maternelle']],

            // Primaire
            ['name' => '1ère Année', 'class_type_id' => $ct['primaire']],
            ['name' => '2ème Année', 'class_type_id' => $ct['primaire']],
            ['name' => '3ème Année', 'class_type_id' => $ct['primaire']],
            ['name' => '4ème Année', 'class_type_id' => $ct['primaire']],
            ['name' => '5ème Année', 'class_type_id' => $ct['primaire']],
            ['name' => '6ème Année', 'class_type_id' => $ct['primaire']],

            // Collège
            ['name' => '7ème Année', 'class_type_id' => $ct['college']],
            ['name' => '8ème Année', 'class_type_id' => $ct['college']],
            ['name' => '9ème Année', 'class_type_id' => $ct['college']],
            ['name' => '10ème Année (BEPC)', 'class_type_id' => $ct['college']],

            // Lycée
            ['name' => '11ème Année - Sciences', 'class_type_id' => $ct['lycee']],
            ['name' => '11ème Année - Littérature', 'class_type_id' => $ct['lycee']],
            ['name' => '12ème Année - Sciences', 'class_type_id' => $ct['lycee']],
            ['name' => '12ème Année - Littérature', 'class_type_id' => $ct['lycee']],
            ['name' => 'Terminale Sciences Mathématiques', 'class_type_id' => $ct['lycee']],
            ['name' => 'Terminale Sciences Expérimentales', 'class_type_id' => $ct['lycee']],
            ['name' => 'Terminale Sciences Sociales', 'class_type_id' => $ct['lycee']],
        ];

        DB::table('my_classes')->insert($data);
    }
}