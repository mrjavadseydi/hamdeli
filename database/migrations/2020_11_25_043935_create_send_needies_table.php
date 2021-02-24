<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendNeediesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_needies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('needie_id');
            $table->foreign('needie_id')->references('id')->on('needies')->onDelete('cascade');
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
        Schema::dropIfExists('send_needies');
    }
}
