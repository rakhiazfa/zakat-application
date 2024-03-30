<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);

        Role::create(['name' => 'Amil Zakat']);

        Role::create(['name' => 'Ketua RW']);

        Role::create(['name' => 'Ketua RT']);
    }
}
