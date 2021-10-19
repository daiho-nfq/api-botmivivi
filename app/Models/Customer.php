<?php

namespace App\Models;

use App\Models\ModelTraits\CanGetTableNameStatically;
use App\Models\ModelTraits\Relations\Customer\HasCustomerLiabilityRelation;
use App\Models\ModelTraits\Unguarded;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Unguarded;
    use CanGetTableNameStatically;
    use HasCustomerLiabilityRelation;

    protected $casts = [
        'note' => AsCollection::class,
    ];
}
