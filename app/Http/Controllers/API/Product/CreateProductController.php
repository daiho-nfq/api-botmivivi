<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;

class CreateProductController extends Controller
{
    public function __invoke(CreateProductRequest $request)
    {
        $productName = $request->name;

        Product::create([
            'manufacturer_id' => $request->manufacturer_id,
            'code' => str_replace(' ', '', Str::lower($productName)),
            'name' => $productName,
            'protein' => $request->protein,
            'type' => $request->type,
            'weight' => $request->weight,
            'use' => $request->use,
        ]);
    }
}
