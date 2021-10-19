<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{

    public function created(Product $product)
    {
        if (! app()->runningInConsole()) {
            $this->configureBasicProductSettings($product);
        }
    }

    public function updated(Product $product)
    {
        //
    }

    protected function configureBasicProductSettings(Product $product)
    {
        $product->productPrice()->create([
            'purchase_price' => request()->get('purchase_price'),
            'wholesale_price' => request()->get('wholesale_price'),
            'retail_price' => request()->get('retail_price'),
        ]);
    }
}
