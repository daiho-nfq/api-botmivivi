<?php

namespace Database\Factories;

use App\Models\Manufacturer;
use App\Utils\StrUtils;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerFactory extends Factory
{
    protected $model = Manufacturer::class;

    public function definition()
    {
        return [
            'unique_identifier' => StrUtils::generateUniqueLenght10(),
            'name' => $this->faker->company,
            'email' => $this->faker->companyEmail,
            'phone_number' => $this->faker->isbn10(),
            'house_number' => $this->faker->buildingNumber,
            'street' => $this->faker->streetName,
            'ward' => $this->faker->streetSuffix,
            'district' => $this->faker->state(),
            'city' => $this->faker->city,
        ];
    }
}
