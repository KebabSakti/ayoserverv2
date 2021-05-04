<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerSecondariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_secondaries', function (Blueprint $table) {
            $table->string('category_id');
            $table->string('banner_secondary_id');
            $table->text('banner_secondary_image');
            $table->text('banner_secondary_link')->nullable();
            $table->enum('banner_secondary_target', ['PRODUCT', 'CATEGORY', 'PROMO'])->nullable();
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
        Schema::dropIfExists('banner_secondaries');
    }
}
