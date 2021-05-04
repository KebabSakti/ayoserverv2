<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rewards', function (Blueprint $table) {
            $table->string('product_reward_id');
            $table->boolean('product_reward_is_exclusive')->default(0);
            $table->enum('product_reward_delivery_type', ['INSTANT', 'TERJADWAL']);
            $table->text('product_reward_deeplink')->nullable();
            $table->text('product_reward_name');
            $table->text('product_reward_description');
            $table->text('product_reward_cover');
            $table->int('product_reward_price');
            $table->int('product_reward_stock');
            $table->boolean('product_reward_is_active')->default(0);
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
        Schema::dropIfExists('product_rewards');
    }
}
