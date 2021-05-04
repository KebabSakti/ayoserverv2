<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('category_id');
            $table->string('sub_category_id');
            $table->string('product_id');
            $table->boolean('product_is_exclusive')->default(0);
            $table->enum('product_delivery_type', ['LANGSUNG', 'TERJADWAL']);
            $table->text('product_deeplink')->nullable();
            $table->text('product_name');
            $table->text('product_description');
            $table->text('product_cover');
            $table->decimal('product_price');
            $table->integer('product_point')->default(0);
            $table->integer('product_view')->default(0);
            $table->integer('product_sold')->default(0);
            $table->integer('product_search')->default(0);
            $table->integer('product_rating_count')->nullable();
            $table->decimal('product_rating_value')->nullable();
            $table->boolean('product_active')->default(1);
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
        Schema::dropIfExists('products');
    }
}
