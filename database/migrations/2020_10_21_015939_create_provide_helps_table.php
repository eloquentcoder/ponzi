<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvideHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provide_helps', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->boolean('merge_status')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('proof_of_payment')->nullable();
            $table->string('receipt_no')->nullable();
            $table->unsignedBigInteger('get_help_id')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->boolean('is_activation')->default(0);
            $table->foreign('get_help_id')->references('id')->on('get_helps')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('provide_helps');
    }
}
