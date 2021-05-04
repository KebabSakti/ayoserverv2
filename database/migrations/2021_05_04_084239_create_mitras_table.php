<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->string('mitra_id');
            $table->enum('mitra_delivery_type', ['INSTANT', 'TERJADWAL']);
            $table->boolean('mitra_is_exclusive')->default(0);
            $table->text('mitra_name');
            $table->text('mitra_address');
            $table->string('mitra_owner');
            $table->string('mitra_phone');
            $table->text('mitra_latitude');
            $table->text('mitra_longitude');
            $table->timestamp('mitra_working_start');
            $table->timestamp('mitra_working_end');
            $table->enum('mitra_status', ['Online', 'Offline', 'Busy', 'Working']);
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
        Schema::dropIfExists('mitras');
    }
}
