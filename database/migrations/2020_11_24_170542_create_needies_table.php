<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeediesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needies', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('person_id',50);
            $table->text('address');
            $table->string('mobile');
            $table->text('leader_status');
            $table->string('bank_info',125);
            $table->integer('is_iranian')->nullable();
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
        Schema::dropIfExists('needies');
    }
}
