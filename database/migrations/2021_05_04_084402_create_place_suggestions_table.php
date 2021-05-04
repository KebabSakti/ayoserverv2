<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_suggestions', function (Blueprint $table) {
            $table->string('place_suggestion_id');
            $table->text('place_suggestion_place_id');
            $table->text('place_suggestion_latitude');
            $table->text('place_suggestion_longitude');
            $table->text('place_suggestion_description');
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
        Schema::dropIfExists('place_suggestions');
    }
}
