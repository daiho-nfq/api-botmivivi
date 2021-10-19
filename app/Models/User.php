<?php

namespace App\Models;

use App\Models\Enums\UserStatusEnum;
use App\Models\ModelTraits\CanGetTableNameStatically;
use App\Models\ModelTraits\HasRole;
use App\Models\ModelTraits\Relations\HasUserLocationRelation;
use App\Models\ModelTraits\Unguarded;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use Unguarded;
    use SoftDeletes;
    use CanGetTableNameStatically;
    use HasRole;
    use HasUserLocationRelation;

    protected $guard_name = 'api';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isInActiveUser(): bool
    {
        return $this->status === UserStatusEnum::STATUS_INACTIVE;
    }

    public function getAgeAttribute(): ?int
    {
        if ($this->date_of_birth) {
            return Carbon::parse($this->date_of_birth)->age;
        }

        return null;
    }

    public function getDateOfBirthAttribute() {
        return Carbon::parse($this->attributes['date_of_birth'])->format(config('app.date_format'));
    }
}
