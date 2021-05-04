<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingWeightProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_weight_products', function (Blueprint $table) {
            $table->string('customer_id');
            $table->string('product_id');
            $table->string('rating_weight_product_id');
            $table->integer('rating_weight_product_one')->default(0);
            $table->integer('rating_weight_product_two')->default(0);
            $table->integer('rating_weight_product_three')->default(0);
            $table->integer('rating_weight_product_four')->default(0);
            $table->integer('rating_weight_product_five')->default(0);
            $table->integer('rating_weight_product_count')->default(0);
            $table->decimal('rating_weight_product_value')->default(0);
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
        Schema::dropIfExists('rating_weight_products');
    }
}
