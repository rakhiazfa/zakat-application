<?php

namespace Database\Seeders;

use App\Models\ZakatPerJiwa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZakatPerJiwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ZakatPerJiwa::create(['key' => 'uang', 'nominal' => 32500]);

        ZakatPerJiwa::create(['key' => 'beras', 'nominal' => 2.5]);
    }
}
