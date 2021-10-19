<?php

namespace App\Http\Middleware;

use App\Exceptions\JsonApiException;
use App\Models\Enums\UserRoleEnum;
use App\Models\User;
use Closure;
use Illuminate\Http\Response;

class EnsureUserIsValid
{
    public function handle($request, Closure $next)
    {
        $userUniqueIdentifier = null;

        if ($request->isMethod('GET')) {
            $userUniqueIdentifier = $request->unique_identifier;
        } else {
            $userUniqueIdentifier = $request->input('unique_identifier');
        }

        if ($userUniqueIdentifier) {
            $user = User::withTrashed()
                ->where('unique_identifier', strtoupper($userUniqueIdentifier))
                ->where('id', '<>', $request->user()->id)
                ->where('role', '<>', UserRoleEnum::ROLE_ADMIN)
                ->first();

            if (! $user) {
                throw new JsonApiException(
                    'validation.user_not_exist',
                    Response::HTTP_NOT_FOUND
                );
            }

            $request->attributes->add(['user' => $user]);

            return $next($request);
        }

        throw new JsonApiException(
            'validation.missing_user_unique_identifier',
            Response::HTTP_NOT_FOUND
        );
    }
}
