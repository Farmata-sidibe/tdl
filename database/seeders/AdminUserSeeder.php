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
            'name' => env('NAME_ADMIN'),
            'email' => env('EMAIL_ADMIN'),
            'password' => bcrypt(env('PASSWORD_ADMIN')),
            'paypal_email' => env('EMAIL_ADMIN'),
            'is_admin' => true,
            'phone' => env('NUMBER_ADMIN'),
            'profile_image' => 'default-profile.jpg',
            'cover_image' => 'default-cover.jpg',
            'country' => 'Country',
            'adress' => '123 Street',
            'code_postal' => '12345',
            'ville' => 'City',
            'email_verified_at' => now(),
        ]);


    }
}
