<?php

namespace App\Eloquent\Scopes;

use App\Models\Enums\UserStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ActiveUserScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('status', UserStatusEnum::STATUS_ACTIVE);
    }
}
