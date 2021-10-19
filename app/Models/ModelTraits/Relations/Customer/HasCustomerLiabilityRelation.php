<?php

namespace App\Models\ModelTraits\Relations\Customer;

use App\Models\CustomerLiability;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasCustomerLiabilityRelation
{
    public function customerLiability(): HasOne
    {
        return $this->hasOne(CustomerLiability::class);
    }
}
