<?php

namespace Database\Factories;

use App\Models\Enums\UserGenderEnum;
use App\Models\Enums\UserRoleEnum;
use App\Models\Enums\UserStatusEnum;
use App\Models\User;
use App\Utils\StrUtils;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'unique_identifier' => StrUtils::generateUniqueLenght10(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'id_card' => $this->faker->isbn10(),
            'full_name' => $this->faker->name(),
            'phone_number' => $this->faker->isbn10(),
            'date_of_birth' => $this->faker->dateTimeBetween('-79 years', '-20 years'),
            'gender' => $this->faker->randomElement(UserGenderEnum::getGenders()),
            'status' => UserStatusEnum::STATUS_ACTIVE,
            'role' => $this->faker->randomElement(UserRoleEnum::getRoles()),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
