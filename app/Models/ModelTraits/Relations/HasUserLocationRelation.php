<?php

namespace App\Models\ModelTraits\Relations;

use App\Models\UserLocation;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasUserLocationRelation
{
    public function userLocation(): HasOne
    {
        return $this->hasOne(UserLocation::class);
    }
}
