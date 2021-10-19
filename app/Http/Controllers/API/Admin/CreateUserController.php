<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\Controller;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Models\User;
use App\Utils\StrUtils;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController extends Controller
{
    public function __invoke(CreateUserRequest $request)
    {
        $user = User::create([
            'unique_identifier' => StrUtils::generateUniqueLenght10(),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_card' => $request->id_card,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'role' => $request->role,
        ]);

        return new JsonResponse([
            'data' => [
                'email' => $user->email,
                'password' => $request->password,
            ],
        ], Response::HTTP_OK);
    }
}
