<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\StudentRecord;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class StudentRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSingleStudent();
        $this->createManyStudents(3);
    }

    // Crée un élève spécifique pour tester
    protected function createSingleStudent()
    {
        $section = Section::first();

        $user = User::factory()->create([
            'name' => 'Student CJ',
            'user_type' => 'student',
            'username' => 'student',
            'password' => Hash::make('cj'),
            'email' => 'student@student.com',
        ]);

        StudentRecord::factory()->create([
            'my_class_id' => $section->my_class_id,
            'section_id' => $section->id,
            'user_id' => $user->id,
        ]);
    }

    // Crée plusieurs élèves aléatoires pour chaque section
    protected function createManyStudents(int $count)
    {
        $sections = Section::all();

        foreach ($sections as $section) {
            User::factory()
                ->count($count)
                ->create([
                    'user_type' => 'student',
                    'password' => Hash::make('student'),
                ])
                ->each(function ($user) use ($section) {
                    StudentRecord::factory()->create([
                        'my_class_id' => $section->my_class_id,
                        'section_id' => $section->id,
                        'user_id' => $user->id,
                    ]);
                });
        }
    }
}
