<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiedsToSends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sends', function (Blueprint $table) {
            $table->integer('extera_money')->default(0);
            $table->text('extera_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sends', function (Blueprint $table) {
            $table->dropColumn('extera_money');
            $table->dropColumn('extera_description');
        });
    }
}
