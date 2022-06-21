<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('control_id')->nullable();
            $table->foreign('control_id')->references('id')->on('controls');

            $table->unsignedBigInteger('pre_control_id')->nullable();
            $table->foreign('pre_control_id')->references('id')->on('pre_controls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['control_id']);
            $table->dropColumn('control_id');

            $table->dropForeign(['pre_control_id']);
            $table->dropColumn('pre_control_id');
        });
    }
}
