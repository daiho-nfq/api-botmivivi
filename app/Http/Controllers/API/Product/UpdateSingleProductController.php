<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateSingleProductController extends Controller
{
    protected const PRODUCT_PRICE_RELATION = 'productPrice';

    public function __invoke(UpdateProductRequest $request)
    {
        $product = $request->get('product');

        $relations = [
            self::PRODUCT_PRICE_RELATION => ProductPrice::class,

        ];

        $relationAttributes = [];

        $productAttributes = $product->attributesToArray();

        foreach ($request->keys() as $field) {
            if (in_array($field, array_keys($productAttributes))) {
                $relationAttributes['product'][$field] = $request->$field;
            } else {
                foreach ($relations as $relation => $class) {
                    if (!isset($$relation)) {
                        if (!$product->$relation) {
                            $product->$relation()->save(new $class());
                            $product->load($relation);
                        }

                        $$relation = $product->$relation->attributesToArray();
                    }

                    if (in_array($field, array_keys($$relation))) {
                        $relationAttributes[$relation][$field] = $request->$field;
                    }
                }
            }
        }

        foreach ($relationAttributes as $relationKey => $v) {
            if ($relationKey !== 'product') {
                $product->$relationKey()->updateOrCreate([
                    'product_id' => $product->id,
                ], $v);
            } else {
                $product->updateOrCreate([
                    'id' => $product->id,
                ], $v);
            }
        }

        return new JsonResponse([
            'status' => 'success',
        ], Response::HTTP_OK);
    }
}
