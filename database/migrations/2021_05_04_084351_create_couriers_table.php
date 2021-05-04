<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->string('courier_id');
            $table->string('courier_name');
            $table->string('courier_phone');
            $table->text('courier_password');
            $table->boolean('courier_is_owner')->default(0);
            $table->decimal('courier_balance');
            $table->text('courier_fcm_token');
            $table->enum('courier_status', ['Online', 'Offline', 'Busy', 'Working']);
            $table->boolean('courier_is_active')->default(1);
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
        Schema::dropIfExists('couriers');
    }
}
