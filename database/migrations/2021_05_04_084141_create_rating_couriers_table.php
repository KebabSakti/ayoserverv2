<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_couriers', function (Blueprint $table) {
            $table->string('customer_id');
            $table->string('courier_id');
            $table->string('rating_courier_id');
            $table->enum('rating_courier_value', [1, 2, 3, 4, 5]);
            $table->text('rating_courier_comment')->nullable();
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
        Schema::dropIfExists('rating_couriers');
    }
}
