<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->truncate();

        $data = [
            ['type' => 'current_session', 'description' => '2025-2026'],
            ['type' => 'system_title', 'description' => 'Smart School'],
            ['type' => 'system_name', 'description' => 'Smart School'],
            ['type' => 'term_begins', 'description' => '01/09/2025'],
            ['type' => 'term_ends', 'description' => '30/06/2026'],
            ['type' => 'phone', 'description' => '+224 622 00 00 00'],
            ['type' => 'address', 'description' => 'Conakry, Kaloum, Quartier Central'],
            ['type' => 'system_email', 'description' => 'contact@smart-school.com'],
            ['type' => 'alt_email', 'description' => 'admin@smart-school.com'],
            ['type' => 'email_host', 'description' => 'smtp.gmail.com'],
            ['type' => 'email_pass', 'description' => env('SMTP_PASSWORD', 'secret')],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => 'logo.png'],

            // Frais par type de classe
            ['type' => 'next_term_fees_maternelle', 'description' => 250000],
            ['type' => 'next_term_fees_primaire', 'description' => 280000],
            ['type' => 'next_term_fees_college', 'description' => 320000],
            ['type' => 'next_term_fees_lycee', 'description' => 400000],
        ];

        DB::table('settings')->insert($data);
    }
}