<?php


namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\User\UpdateUserProfileBaseController;
use App\Http\Requests\Admin\User\EditSingleUserProfileRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EditSingleUserProfileController extends UpdateUserProfileBaseController
{
    public function __invoke(EditSingleUserProfileRequest $request)
    {
        $this->updateUser($request->get('user'), $request);

        return new JsonResponse([
            'status' => 'success',
        ], Response::HTTP_OK);
    }
}
