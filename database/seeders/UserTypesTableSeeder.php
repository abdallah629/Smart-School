<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['title' => 'super_admin', 'name' => 'Super Administrateur', 'level' => 1],
            ['title' => 'admin', 'name' => 'Administrateur', 'level' => 2],
            ['title' => 'teacher', 'name' => 'Enseignant', 'level' => 3],
            ['title' => 'parent', 'name' => 'Parent', 'level' => 4],
            ['title' => 'accountant', 'name' => 'Comptable', 'level' => 5],
         // ['title' => 'librarian', 'name' => 'Bibliothécaire', 'level' => 6],
        ];

        DB::table('user_types')->insert($data);
    }
}