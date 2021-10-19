<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\Controller;
use App\Http\Resources\User\UserResource;

class GetCurrentUserController extends Controller
{
    public function __invoke()
    {
        return new UserResource(auth()->user());
    }
}
