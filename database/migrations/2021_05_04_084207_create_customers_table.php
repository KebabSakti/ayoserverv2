<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('customer_id');
            $table->string('customer_phone');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->text('customer_password');
            $table->text('customer_fcm');
            $table->boolean('customer_is_guest')->default(1);
            $table->int('customer_point')->default(0);
            $table->boolean('customer_is_active')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
