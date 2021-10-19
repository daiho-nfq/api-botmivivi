<?php

namespace App\Http\Controllers\API\User;

use App\Http\Requests\User\UpdateCurrentUserProfileRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateCurrentUserProfileController extends UpdateUserProfileBaseController
{
    public function __invoke(UpdateCurrentUserProfileRequest $request)
    {
        $user = $request->user();

        $this->updateUser($user, $request);

        return new JsonResponse([
            'status' => 'success',
        ], Response::HTTP_OK);
    }
}
