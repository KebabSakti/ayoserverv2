<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_mailboxes', function (Blueprint $table) {
            $table->string('customer_mailbox_id');
            $table->text('customer_mailbox_title');
            $table->text('customer_mailbox_description');
            $table->boolean('customer_mailbox_is_read')->default(0);
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
        Schema::dropIfExists('customer_mailboxes');
    }
}
