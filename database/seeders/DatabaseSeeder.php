<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
