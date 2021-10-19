<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{

    public function created(User $user)
    {
        if (! app()->runningInConsole()) {
            $this->configureBasicUserSettings($user);
        }
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    protected function configureBasicUserSettings(User $user)
    {
        $user->userLocation()->create();
    }
}
