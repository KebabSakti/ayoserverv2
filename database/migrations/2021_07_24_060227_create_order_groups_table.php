<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_groups', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('mitra_id');
            $table->string('courier_id');
            $table->string('order_group_id');
            $table->enum('order_group_delivery_type', ['LANGSUNG','TERJADWAL']);
            $table->enum('order_group_status', ['SUCCESS', 'FAILED', 'PENDING', 'CANCELED'])->default('PENDING');
            $table->decimal('order_group_shipping_fee')->default(0.00);
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
        Schema::dropIfExists('order_groups');
    }
}
