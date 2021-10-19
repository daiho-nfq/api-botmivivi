<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Enums\CustomerMainBusinessSectorEnum;
use App\Models\Enums\CustomerPurchaseTypeEnum;
use App\Utils\StrUtils;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'unique_identifier' => StrUtils::generateUniqueLenght10(),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->isbn10(),
            'main_business_sector' => $this->faker->randomElement(CustomerMainBusinessSectorEnum::getCustomerMainBusinessSectors()),
            'purchase_type' => $this->faker->randomElement(CustomerPurchaseTypeEnum::getCustomerPurchaseTypes()),
            'house_number' => $this->faker->buildingNumber(),
            'street' => $this->faker->streetName(),
            'ward' => $this->faker->streetSuffix(),
            'district' => $this->faker->state(),
            'city' => $this->faker->city(),
            'note' => [
                'common' => $this->faker->text(30),
                'other' => $this->faker->text(30),
            ]
        ];
    }
}
