<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductPrice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $purchasePrice = $this->faker->numberBetween(10000, 20000);
        $wholesalePrice = $purchasePrice + 400;
        $detailPrice = $wholesalePrice + 300;

        return [
            'product_id' => Product::factory(),
            'purchase_price' => $purchasePrice,
            'wholesale_price' => $wholesalePrice,
            'retail_price' => $detailPrice,
        ];
    }
}
