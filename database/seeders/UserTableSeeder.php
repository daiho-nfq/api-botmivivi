<?php

namespace Database\Seeders;

use App\Models\Enums\UserRoleEnum;
use App\Models\Enums\UserStatusEnum;
use App\Models\User;
use App\Models\UserLocation;
use App\Utils\StrUtils;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    private const ADMIN_USER_LIST = [
        'dai.ho@botmivivi.com'
    ];

    private const PREMIUM_USER_LIST = [

    ];

    private const BASIC_USER_LIST = [];

    public function run()
    {
        collect(self::ADMIN_USER_LIST)->each(function($email) {
            User::factory()
                ->has(UserLocation::factory())
                ->create(
                    [
                        'unique_identifier' => StrUtils::generateUniqueLenght10(),
                        'email' => $email,
                        'password' => bcrypt('botmivivi'),
                        'full_name' => 'Dai Ho',
                        'id_card' => '07909500xxxx',
                        'date_of_birth' => '1995-11-10',
                        'gender' => 'male',
                        'phone_number' => '090249xxxx',
                        'role' => UserRoleEnum::ROLE_ADMIN,
                        'status' => UserStatusEnum::STATUS_ACTIVE,
                        'email_verified_at' => now(),
                        'remember_token' => Str::random(10),
                    ]
                );
        });

        User::factory(10)
            ->unverified()
            ->has(UserLocation::factory())
            ->create();
    }
}
