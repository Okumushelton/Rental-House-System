<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RRN');
            $table->string('ResponseCode');
            $table->string('ResponseDescription')->nullable();
            $table->string('MpesaTranID');
            $table->string('ReceiverName');
            $table->string('ReceiverMsisdn')->nullable();;
            $table->string('MobileNumber');
            $table->string('Amount');
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
        Schema::dropIfExists('mpesas');
    }
}
