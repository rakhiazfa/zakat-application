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
            'name' => 'Super Admin',
            'email' => 'super.admin@upz.co.id',
            'username' => 'super.admin',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Super Admin');

        // 

        $user = User::create([
            'name' => 'Amil Zakat 01',
            'email' => 'amil.zakat01@upz.co.id',
            'username' => 'amil.zakat01',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 02',
            'email' => 'amil.zakat02@upz.co.id',
            'username' => 'amil.zakat02',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 03',
            'email' => 'amil.zakat03@upz.co.id',
            'username' => 'amil.zakat03',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 04',
            'email' => 'amil.zakat04@upz.co.id',
            'username' => 'amil.zakat04',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Amil Zakat');

        $user = User::create([
            'name' => 'Amil Zakat 05',
            'email' => 'amil.zakat05@upz.co.id',
            'username' => 'amil.zakat05',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Amil Zakat');

        // 

        $user = User::create([
            'name' => 'Ketua RW',
            'email' => 'ketua.rw19@upz.co.id',
            'username' => 'ketua.rw19',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RW');

        $user = User::create([
            'name' => 'Ketua RT 01',
            'email' => 'ketua.rt01@upz.co.id',
            'username' => 'ketua.rt01',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RT');

        $user = User::create([
            'name' => 'Ketua RT 02',
            'email' => 'ketua.rt02@upz.co.id',
            'username' => 'ketua.rt02',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RT');

        $user = User::create([
            'name' => 'Ketua RT 03',
            'email' => 'ketua.rt03@upz.co.id',
            'username' => 'ketua.rt03',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RT');

        $user = User::create([
            'name' => 'Ketua RT 04',
            'email' => 'ketua.rt04@upz.co.id',
            'username' => 'ketua.rt04',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RT');

        $user = User::create([
            'name' => 'Ketua RT 05',
            'email' => 'ketua.rt05@upz.co.id',
            'username' => 'ketua.rt05',
            'password' => Hash::make('Merdekalio19'),
        ]);
        $user->assignRole('Ketua RT');
    }
}
