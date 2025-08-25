<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2025-2026'], // session scolaire actuelle
            ['type' => 'system_title', 'description' => 'Smart'],
            ['type' => 'system_name', 'description' => 'Smart School'],
            ['type' => 'term_begins', 'description' => '01/09/2025'], // début du trimestre
            ['type' => 'term_ends', 'description' => '30/06/2026'],    // fin du trimestre
            ['type' => 'phone', 'description' => '+224 622 00 00 00'], // téléphone guinéen
            ['type' => 'address', 'description' => 'Conakry, Kaloum, Quartier Central'],
            ['type' => 'system_email', 'description' => 'comptedeveloppeur30@gmail.com'],
            ['type' => 'alt_email', 'description' => 'admin@gmail.com'],
            ['type' => 'email_host', 'description' => 'smtp.gmail.com'],
            ['type' => 'email_pass', 'description' => 'votre_mot_de_passe'], 
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => 'logo.png'],
            // frais scolaires par niveau (en francs guinéens)
            ['type' => 'next_term_fees_PS', 'description' => '200000'],  // maternelle
            ['type' => 'next_term_fees_MS', 'description' => '200000'],  // maternelle
            ['type' => 'next_term_fees_GS', 'description' => '250000'], // primaire normale
            ['type' => 'next_term_fees_1A', 'description' => '250000'],  // primaire
            ['type' => 'next_term_fees_2A', 'description' => '250000'],  // primaire
            ['type' => 'next_term_fees_7A', 'description' => '256000'],  // collège
            ['type' => 'next_term_fees_11AS', 'description' => '156000'],  // lycée série scientifique
            ['type' => 'next_term_fees_TSM', 'description' => '160000'],  // lycée série littéraire
        ];

        DB::table('settings')->insert($data);
    }
}