<?php

namespace App\Rules;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Enums\ProductTypeEnum;
use App\Models\Enums\ProductWeightEnum;
use Illuminate\Contracts\Validation\Rule;

class ProductWeightValidator implements Rule
{
    protected AbstractFormRequest $request;

    public function __construct(AbstractFormRequest $request)
    {
        $this->request = $request;
    }

    public function passes($attribute, $value)
    {
        $type = $this->request->input('type');

        if ($type !== ProductTypeEnum::BAG && $value !== ProductWeightEnum::WEIGHT_1_KG) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'validation.invalid_weight_for_product_type';
    }
}
