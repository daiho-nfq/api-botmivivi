<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\API\Controller;
use App\Models\User;
use App\Models\UserLocation;

class UpdateUserProfileBaseController extends Controller
{
    protected const USER_LOCATION_RELATION = 'userLocation';

    public function updateUser(User $user, $request)
    {
        $relations = [
            self::USER_LOCATION_RELATION => UserLocation::class,
        ];

        $relationAttributes = [];

        $productAttributes = $user->attributesToArray();

        foreach ($request->keys() as $field) {
            if (in_array($field, array_keys($productAttributes))) {
                $relationAttributes['user'][$field] = $request->$field;
            } else {
                foreach ($relations as $relation => $class) {
                    if (!isset($$relation)) {
                        if (!$user->$relation) {
                            $user->$relation()->save(new $class());
                            $user->load($relation);
                        }

                        $$relation = $user->$relation->attributesToArray();
                    }

                    if (in_array($field, array_keys($$relation))) {
                        $relationAttributes[$relation][$field] = $request->$field;
                    }
                }
            }
        }

        foreach ($relationAttributes as $relationKey => $v) {
            if ($relationKey !== 'user') {
                $user->$relationKey()->updateOrCreate([
                    'user_id' => $user->id,
                ], $v);
            } else {
                $user->updateOrCreate([
                    'id' => $user->id,
                ], $v);
            }
        }
    }
}
