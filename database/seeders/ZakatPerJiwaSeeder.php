<?php

namespace Database\Seeders;

use App\Models\ZakatPerJiwa;
use Illuminate\Database\Seeder;

class ZakatPerJiwaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ZakatPerJiwa::create(['key' => 'uang', 'nominal' => 40000]);

        ZakatPerJiwa::create(['key' => 'beras', 'nominal' => 2.5]);
    }
}
