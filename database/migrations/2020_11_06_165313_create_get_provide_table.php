<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetProvideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_provide', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('get_help_id');
            $table->unsignedBigInteger('provide_help_id');
            $table->integer('amount');
            $table->boolean('received')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->string('proof_of_payment')->nullable();
            $table->string('receipt_no')->nullable();
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
        Schema::dropIfExists('get_provide');
    }
}
