<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLiabilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_liabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained();
            $table->decimal('short_term', 15, 2)->default(0);
            $table->decimal('long_term', 15, 2)->default(0);
            $table->decimal('other',15, 2)->default(0);
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_liabilities');
    }
}
