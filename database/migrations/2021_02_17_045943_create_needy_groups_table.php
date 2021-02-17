<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedyGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needy_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("group_id");
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cadcade');
            $table->unsignedBigInteger('needie_id');
            $table->foreign('needie_id')->references('id')->on('needies')->onDelete('cascade');
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
        Schema::dropIfExists('needy_groups');
    }
}
