<?php

namespace Database\Seeders;
use App\User;
use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = [
            ['name' => 'Anglais', 'slug' => 'ENG'],
            ['name' => 'Mathématiques', 'slug' => 'MATH'],
        ];

        // Récupérer un enseignant aléatoire si plusieurs existants
        $teacher = User::where('user_type', 'teacher')->inRandomOrder()->first();

        if (!$teacher) {
            $this->command->info('Aucun enseignant trouvé. Veuillez créer un enseignant avant de lancer ce seeder.');
            return;
        }

        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {
            $data = [];

            foreach ($subjects as $subject) {
                $data[] = [
                    'name' => $subject['name'],
                    'slug' => $subject['slug'],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('subjects')->insert($data);
        }
    }
}