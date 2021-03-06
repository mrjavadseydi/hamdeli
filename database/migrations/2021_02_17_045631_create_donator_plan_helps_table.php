<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatorPlanHelpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donator_plan_helps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('donator_id');
            $table->foreign('donator_id')->references('id')->on('donators')->onDelete('cascade');
            $table->unsignedBigInteger('donations_id');
            $table->boolean('money');
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
        Schema::dropIfExists('donator_plan_helps');
    }
}
