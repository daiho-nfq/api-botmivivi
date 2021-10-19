<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('house_number', 20)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('ward', 30)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('home_town')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
