<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\Controller;
use App\Http\Resources\Product\ProductListCollection;
use App\Models\Product;

class GetProductListController extends Controller
{
    public function __invoke()
    {
        $productList = Product::paginate(20);

        return (new ProductListCollection($productList));
    }
}
