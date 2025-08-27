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
    }

    /**
     * Crée les utilisateurs principaux.
     */
    protected function createMainUsers()
    {
        $password = Hash::make('12345678'); // Mot de passe par défaut

        $users = [
            [
                'name' => 'Abdoulaye CAMARA',
                'email' => 'comptedeveloppeur30@gmail.com',
                'username' => 'developpeur',
                'password' => $password,
                'user_type' => 'super_admin',
            ],
        ];

        foreach ($users as &$user) {
            $user['code'] = strtoupper(Str::random(10));
            $user['remember_token'] = Str::random(10);
        }

        DB::table('users')->insert($users);
    }
}