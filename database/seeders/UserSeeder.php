<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom' => 'admin',
            'prenom' => 'stephen',
            'email' => 'admin@gmail.com',
            'dateNaissance' => '2000-01-01',
            'telephone' => '+237698803159',
            'adresse' => 'Douala',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('admin');

       User::create([
            'nom' => 'user',
            'prenom' => 'stephen',
            'email' => 'user@gmail.com',
            'dateNaissance' => '2000-01-01',
            'telephone' => '+237698803159',
            'adresse' => 'Douala',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('patient');
    }
}
