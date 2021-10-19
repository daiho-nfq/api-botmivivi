<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::factory(12)
            ->has(
                Product::factory(rand(3,10))
                    ->has(ProductPrice::factory())
            )
            ->create();
    }
}
