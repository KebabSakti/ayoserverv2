<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('customer_id');
            $table->string('mitra_id');
            $table->string('courier_id');
            $table->string('courier_income_id');
            $table->decimal('courier_income_fee');
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
        Schema::dropIfExists('courier_incomes');
    }
}
