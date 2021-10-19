<?php

namespace App\Http\Controllers\API\Admin;

use App\Eloquent\Scopes\ActiveUserScope;
use App\Http\Controllers\API\Controller;
use App\Http\Resources\User\UserListCollection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GetUserListController extends Controller
{
    public function __invoke()
    {
        $users = User::withoutGlobalScope(ActiveUserScope::class)
            ->where('id', '<>', Auth::user()->getAuthIdentifier())
            ->paginate(5);

        return (new UserListCollection($users));
    }
}
