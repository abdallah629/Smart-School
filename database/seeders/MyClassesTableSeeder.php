<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyClassesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('my_classes')->truncate();

        // Récupère tous les types de classes avec leurs codes
        $classTypes = ClassType::pluck('id', 'code')->all();

        $data = [];

        // Maternelle
        foreach (['PS', 'MS', 'GS'] as $code) {
            $data[] = ['name' => $code, 'class_type_id' => $classTypes[$code]];
        }

        // Primaire
        foreach (['1A','2A','3A','4A','5A','6A'] as $code) {
            $data[] = ['name' => $code, 'class_type_id' => $classTypes[$code]];
        }

        // Collège
        foreach (['7A','8A','9A','10A'] as $code) {
            $data[] = ['name' => $code, 'class_type_id' => $classTypes[$code]];
        }

        // Lycée
        foreach (['11AS','11AL','12AS','12AL','TSM','TSE','TSS'] as $code) {
            $data[] = ['name' => $code, 'class_type_id' => $classTypes[$code]];
        }

        DB::table('my_classes')->insert($data);
    }
}