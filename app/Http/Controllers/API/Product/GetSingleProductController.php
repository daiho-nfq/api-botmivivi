<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\Controller;
use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Request;

class GetSingleProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $product = $request->get('product');

        return (new ProductResource($product));
    }
}
