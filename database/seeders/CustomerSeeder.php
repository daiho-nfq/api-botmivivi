<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerLiability;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::factory(400)
            ->has(CustomerLiability::factory())
            ->create();
    }
}
