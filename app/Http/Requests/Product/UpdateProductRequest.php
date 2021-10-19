<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Enums\ProductTypeEnum;
use App\Models\Enums\ProductWeightEnum;
use App\Rules\ProductWeightValidator;

class UpdateProductRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'protein' => ['required', 'numeric'],
            'type' => ['required', 'in:' . implode(',', ProductTypeEnum::getProductType())],
            'weight' => ['required','numeric', 'in:' . implode(',', ProductWeightEnum::getProductWeight()), new ProductWeightValidator($this)],
            'use' => ['required', 'array'],
            'purchase_price' => ['required', 'sometimes', 'numeric'],
            'wholesale_price' => ['required', 'sometimes', 'numeric'],
            'retail_price' => ['required', 'sometimes', 'numeric'],
        ];
    }
}
