<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCupboardIdToLockers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lockers', function (Blueprint $table) {
            $table->unsignedBigInteger('cupboard_id');
            $table->foreign('cupboard_id')->references('id')->on('cupboards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lockers', function (Blueprint $table) {
            //
        });
    }
}
