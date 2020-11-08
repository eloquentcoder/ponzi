<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_helps', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->boolean('awaiting_to_receive')->default(false);
            $table->boolean('merge_status')->default(false);
            $table->dateTime('maturity_period')->nullable();
            $table->boolean('received')->default(false);
            $table->boolean('is_bonus_withdrawal')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('get_helps');
    }
}
