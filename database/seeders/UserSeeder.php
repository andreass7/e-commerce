<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Membuat admin user
        User::create([
            'name' => 'Andreas',
            'role' => 'admin',
            'phone' => $faker->phoneNumber,
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Hash password
        ]);

        // Membuat pengguna biasa
        // for ($i = 0; $i < 10; $i++) {
        //     User::create([
        //         'name' => $faker->name,
        //         'phone' => $faker->unique()->phoneNumber,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => Hash::make('password'), // Hash password
        //         'is_admin' => false,
        //     ]);
        // }
    }
}
