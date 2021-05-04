<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_baskets', function (Blueprint $table) {
            $table->string('customer_id');
            $table->string('order_id');
            $table->string('product_reward_id');
            $table->string('reward_basket_id');
            $table->int('reward_basket_qty');
            $table->int('reward_basket_price');
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
        Schema::dropIfExists('reward_baskets');
    }
}
