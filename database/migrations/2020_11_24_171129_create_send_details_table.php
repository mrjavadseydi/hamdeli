<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_details', function (Blueprint $table) {
            $table->id();
            $table->integer('source_type');
            $table->unsignedBigInteger('Source_id');
            $table->unsignedBigInteger('send_id');
            $table->foreign('send_id')->references('id')->on('sends')->onDelete('cascade');
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
        Schema::dropIfExists('send_details');
    }
}
