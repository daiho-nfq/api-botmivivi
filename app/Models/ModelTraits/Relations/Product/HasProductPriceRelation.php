<?php

namespace App\Models\ModelTraits\Relations\Product;

use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasProductPriceRelation
{
    public function productPrice(): HasOne
    {
        return $this->hasOne(ProductPrice::class);
    }
}
