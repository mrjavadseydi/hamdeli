<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildNeediesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_needies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('needie_id');
            $table->text('name');
            $table->string('person_id');
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
        Schema::dropIfExists('child_needies');
    }
}
