<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Enums\ProductTypeEnum;
use App\Models\Enums\ProductWeightEnum;
use App\Models\Manufacturer;
use App\Rules\ProductWeightValidator;

class CreateProductRequest extends AbstractFormRequest
{
    public function rules()
    {
        $manufacturer = Manufacturer::count();

        return [
            'manufacturer_id' => ['required', 'integer', 'max:' . $manufacturer],
            'name' => ['required', 'max:50', 'unique:products'],
            'protein' => ['required', 'numeric'],
            'type' => ['required', 'in:' . implode(',', ProductTypeEnum::getProductType())],
            'weight' => ['required','numeric', 'in:' . implode(',', ProductWeightEnum::getProductWeight()), new ProductWeightValidator($this)],
            'use' => ['required', 'array'],
            'purchase_price' => ['numeric'],
            'wholesale_price' => ['required', 'numeric'],
            'retail_price' => ['required', 'numeric'],
        ];
    }
}
