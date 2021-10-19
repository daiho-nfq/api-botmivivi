<?php

namespace Database\Factories;

use App\Models\CustomerLiability;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerLiabilityFactory extends Factory
{
    protected $model = CustomerLiability::class;

    public function definition()
    {
        return [
            'short_term' => 0,
            'long_term' => 0,
            'other' => 0,
            'updated_by' => null,
        ];
    }
}
