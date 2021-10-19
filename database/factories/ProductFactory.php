<?php

namespace Database\Factories;

use App\Models\Enums\ProductTypeEnum;
use App\Models\Enums\ProductUseEnum;
use App\Models\Enums\ProductWeightEnum;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $productName = $this->faker->streetName;
        $code = str_replace(' ', '', Str::lower($productName));

        $type = $this->faker->randomElement(ProductTypeEnum::getProductType());

        $weight = $type !== ProductTypeEnum::BAG
            ? ProductWeightEnum::WEIGHT_1_KG
            : $this->faker->randomElement(ProductWeightEnum::getProductWeight());

        $use = ProductUseEnum::getProductUse();

        return [
            'manufacturer_id' => Manufacturer::factory(),
            'code' => $code,
            'name' => $productName,
            'protein' => $this->faker->randomFloat(2,0,15),
            'type' => $type,
            'weight' => $weight,
            'use' => $this->faker->randomElements($use, $this->faker->numberBetween(1, 3)),
        ];
    }
}
