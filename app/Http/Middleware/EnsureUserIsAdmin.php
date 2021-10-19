<?php

namespace App\Http\Middleware;

use App\Exceptions\JsonApiException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (! $user->isAdmin()) {
            throw new JsonApiException(
                'validation.user_is_not_allowed_to_do_action',
                Response::HTTP_NOT_FOUND
            );
        }

        return $next($request);
    }
}
