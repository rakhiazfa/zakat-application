<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Rakhi Azfa Rifansya',
            'email' => 'rakhiazfa0421@gmail.com',
            'username' => 'sensitive.monkey',
            'password' => Hash::make('Rakhiazfa@060704'),
        ]);
        $user->assignRole('Super Admin');

        $user = User::create([
            'name' => 'Amil Zakat 01',
            'email' => 'amil.zakat01@example.com',
            'username' => 'amil.zakat01',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 02',
            'email' => 'amil.zakat02@example.com',
            'username' => 'amil.zakat02',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 03',
            'email' => 'amil.zakat03@example.com',
            'username' => 'amil.zakat03',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 04',
            'email' => 'amil.zakat04@example.com',
            'username' => 'amil.zakat04',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 05',
            'email' => 'amil.zakat05@example.com',
            'username' => 'amil.zakat05',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole('Amil Zakat');
    }
}
