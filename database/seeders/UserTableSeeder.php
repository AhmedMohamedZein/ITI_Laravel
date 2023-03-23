<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ahmed Zein',
            'email' => 'ahmedzein@gmail.com'
        ]);

        User::create([
            'name' => 'Omnia Zein',
            'email' => 'omniazein@gmail.com'
        ]);

        User::create([
            'name' => 'Maryam Zein',
            'email' => 'maryamzein@gmail.com'
        ]);

        User::create([
            'name' => 'Mohamed Zein',
            'email' => 'mohamedzein@gmail.com'
        ]);

        User::create([
            'name' => 'Abd el rahman Zein',
            'email' => 'abdelrahmanzein@gmail.com'
        ]);

        User::create([
            'name' => 'Shadia ali',
            'email' => 'shadiaali@gmail.com'
        ]);
    }
}
