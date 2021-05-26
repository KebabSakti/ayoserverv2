<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_actions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('courier_id');
            $table->string('customer_id');
            $table->string('courier_action_id');
            $table->enum('courier_action_status', ['ACCEPT', 'REJECT', 'IGNORE']);
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
        Schema::dropIfExists('courier_actions');
    }
}
