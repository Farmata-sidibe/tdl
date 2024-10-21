<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create user admin
        User::factory()->create([
            'name' => 'Farmata SIDIBE',
            'email' => 'farmata98hadem@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'phone' => '1234567890',
            'avatar' => null,
            'country' => 'Country',
            'adress' => '123 Street',
            'code_postal' => '12345',
            'ville' => 'City',
            'email_verified_at' => now(),
        ]);


    }
}
