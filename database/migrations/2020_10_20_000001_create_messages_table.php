<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('iyngaran.messages.messages_table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message_from_name');
            $table->string('message_from_email');
            $table->string('message_from_phone')->nullable();
            $table->text('message');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('messageable_id')->nullable();
            $table->string('messageable_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on(config('iyngaran.messages.user_table_name'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('iyngaran.messages.messages_table_name'));
    }
}
