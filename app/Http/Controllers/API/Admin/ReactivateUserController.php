<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\Controller;
use App\Models\Enums\UserStatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReactivateUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->get('user');

        $user->update([
            'status' => UserStatusEnum::STATUS_ACTIVE,
        ]);

        return new JsonResponse([
            'status' => 'success',
        ], Response::HTTP_OK);
    }
}
