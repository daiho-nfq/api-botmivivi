<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLocationFactory extends Factory
{
    protected $model = UserLocation::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'house_number' => $this->faker->buildingNumber(),
            'street' => $this->faker->streetName(),
            'ward' => $this->faker->streetSuffix(),
            'district' => $this->faker->state(),
            'city' => $this->faker->city(),
            'home_town' => $this->faker->city(),
        ];
    }
}
