<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('customer_id');
            $table->string('mitra_id');
            $table->string('courier_id');
            $table->string('order_id');
            $table->text('order_invoice');
            $table->integer('order_qty_total');
            $table->decimal('order_price_total');
            $table->string('voucher_id')->nullable();
            $table->decimal('voucher_amount')->nullable();
            $table->enum('order_payment_method', ['PG', 'COD']);
            $table->text('order_payment_ref_id')->nullable();
            $table->text('order_payment_url')->nullable();
            $table->decimal('order_payment_fee')->default(0);
            $table->enum('order_payment_status', ['PAID', 'UNPAID'])->default('UNPAID');
            $table->enum('order_status', ['SUCCESS', 'FAILED', 'PENDING', 'CANCELED'])->default('PENDING');
            $table->text('order_status_note')->nullable();
            $table->text('order_shipping_place_id')->nullable();
            $table->text('order_shipping_address');
            $table->text('order_shipping_latitude');
            $table->text('order_shipping_longitude');
            $table->text('order_shipping_fee');
            $table->decimal('order_shipping_distance')->nullable();
            $table->integer('order_shipping_duration')->nullable();
            $table->text('order_shipping_note')->nullable();
            $table->decimal('order_pay_total');
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
        Schema::dropIfExists('orders');
    }
}
