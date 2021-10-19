<?php

namespace App\Models;

use App\Models\ModelTraits\CanGetTableNameStatically;
use App\Models\ModelTraits\Relations\Product\HasProductPriceRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use HasProductPriceRelation;
    use SoftDeletes;
    use CanGetTableNameStatically;

    protected $casts = [
        'use' => 'array',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
