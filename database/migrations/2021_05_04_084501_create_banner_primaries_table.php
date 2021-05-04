<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerPrimariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_primaries', function (Blueprint $table) {
            $table->string('banner_primary_id');
            $table->text('banner_primary_image');
            $table->text('banner_primary_link')->nullable();
            $table->enum('banner_primary_target', ['PRODUCT', 'CATEGORY', 'PROMO'])->nullable();
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
        Schema::dropIfExists('banner_primaries');
    }
}
