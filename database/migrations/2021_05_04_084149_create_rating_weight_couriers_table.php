<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingWeightCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_weight_couriers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('courier_id');
            $table->string('rating_weight_courier_id');
            $table->integer('rating_weight_courier_one')->default(0);
            $table->integer('rating_weight_courier_two')->default(0);
            $table->integer('rating_weight_courier_three')->default(0);
            $table->integer('rating_weight_courier_four')->default(0);
            $table->integer('rating_weight_courier_five')->default(0);
            $table->integer('rating_weight_courier_count')->default(0);
            $table->decimal('rating_weight_courier_value')->default(0);
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
        Schema::dropIfExists('rating_weight_couriers');
    }
}
