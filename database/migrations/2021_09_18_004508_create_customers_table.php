<?php

use App\Models\Enums\CustomerMainBusinessSectorEnum;
use App\Models\Enums\CustomerPurchaseTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('unique_identifier', 20)->unique();
            $table->string('email', 50)->unique()->nullable();
            $table->string('name', 50)->unique();
            $table->string('phone_number', 12);
            $table->enum('main_business_sector', CustomerMainBusinessSectorEnum::getCustomerMainBusinessSectors());
            $table->enum('purchase_type', CustomerPurchaseTypeEnum::getCustomerPurchaseTypes());
            $table->string('house_number', 20)->nullable();
            $table->string('street', 50)->nullable();
            $table->string('ward', 30)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('city', 50)->nullable();
            $table->longText('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
