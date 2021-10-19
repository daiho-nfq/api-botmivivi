<?php

namespace App\Http\Middleware;

use App\Exceptions\JsonApiException;
use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureProductIsValid
{
    public function handle(Request $request, Closure $next)
    {
        $productCode = $request->product_code;

        if ($productCode) {
            $product = Product::withTrashed()
                ->where('code', strtolower($productCode))
                ->first();

            if (! $product) {
                throw new JsonApiException(
                    'validation.product_not_exist',
                    Response::HTTP_NOT_FOUND
                );
            }

            if ($product->trashed()) {
                throw new JsonApiException(
                    'validation.product_is_deleted',
                    Response::HTTP_NOT_FOUND
                );
            }

            $request->attributes->add(['product' => $product]);

            return $next($request);
        }

        throw new JsonApiException(
            'validation.missing_product_code',
            Response::HTTP_NOT_FOUND
        );
    }
}
