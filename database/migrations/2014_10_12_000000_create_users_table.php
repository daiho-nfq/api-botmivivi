<?php

use App\Models\Enums\UserGenderEnum;
use App\Models\Enums\UserRoleEnum;
use App\Models\Enums\UserStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unique_identifier', 20)->unique();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('id_card')->nullable()->unique();
            $table->string('full_name', 50)->nullable();
            $table->string('phone_number', 12)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', UserGenderEnum::getGenders());
            $table->enum('status', UserStatusEnum::getStatuses())->default(UserStatusEnum::STATUS_ACTIVE);
            $table->enum('role', [UserRoleEnum::getRoles(), UserRoleEnum::ROLE_ADMIN]);
            $table->timestamp('email_verified_at')->nullable()->default(now());
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
