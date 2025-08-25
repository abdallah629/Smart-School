<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->delete();

        $this->createMainUsers();
        $this->createSampleUsers(3);
    }

    /**
     * Crée les utilisateurs principaux.
     */
    protected function createMainUsers()
    {
        $password = Hash::make('cj'); // Mot de passe par défaut

        $users = [
            [
                'name' => 'CJ Inspired',
                'email' => 'cj@cj.com',
                'username' => 'cj',
                'password' => $password,
                'user_type' => 'super_admin',
            ],
            [
                'name' => 'Admin Kaba',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => $password,
                'user_type' => 'admin',
            ],
            [
                'name' => 'Teacher Diallo',
                'email' => 'teacher@teacher.com',
                'username' => 'teacher',
                'password' => $password,
                'user_type' => 'teacher',
            ],
            [
                'name' => 'Parent Camara',
                'email' => 'parent@parent.com',
                'username' => 'parent',
                'password' => $password,
                'user_type' => 'parent',
            ],
            [
                'name' => 'Accountant Barry',
                'email' => 'accountant@accountant.com',
                'username' => 'accountant',
                'password' => $password,
                'user_type' => 'accountant',
            ],
        ];

        foreach ($users as &$user) {
            $user['code'] = strtoupper(Str::random(10));
            $user['remember_token'] = Str::random(10);
        }

        DB::table('users')->insert($users);
    }

    /**
     * Crée des utilisateurs d’exemple pour testing.
     */
    protected function createSampleUsers(int $count)
    {
        $user_types = ['student', 'teacher', 'librarian']; // Types d’utilisateurs réalistes

        $data = [];

        for ($i = 1; $i <= $count; $i++) {
            foreach ($user_types as $type) {
                $data[] = [
                    'name' => ucfirst($type).' '.$i,
                    'email' => $type.$i.'@example.com',
                    'username' => $type.$i,
                    'password' => Hash::make($type),
                    'user_type' => $type,
                    'code' => strtoupper(Str::random(10)),
                    'remember_token' => Str::random(10),
                ];
            }
        }

        DB::table('users')->insert($data);
    }
}