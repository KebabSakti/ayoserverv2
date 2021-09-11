<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_channels', function (Blueprint $table) {
            $table->id();
            $table->string('payment_channel_id');
            $table->string('payment_channel_code');
            $table->text('payment_channel_name');
            $table->text('payment_channel_icon')->nullable();
            $table->boolean('payment_channel_active')->default(0);
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
        Schema::dropIfExists('payment_channels');
    }
}
