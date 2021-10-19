<?php

namespace App\Models;

use App\Models\ModelTraits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerLiability extends Model
{
    use HasFactory;
    use CanGetTableNameStatically;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($model)
        {
            $model->updated_by = auth()->user()->id;
        });
    }
}
