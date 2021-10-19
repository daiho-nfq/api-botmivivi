<?php

namespace App\Http\Middleware;

use App\Exceptions\JsonApiException;
use App\Models\Enums\UserRoleEnum;
use Closure;
use Illuminate\Http\Response;

class PreventRequestFromInActiveUser
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user->isInActiveUser() && $user->role !== UserRoleEnum::ROLE_ADMIN) {
            throw new JsonApiException(
                'validation.user_inactivate',
                Response::HTTP_FORBIDDEN
            );
        }

        return $next($request);
    }
}
