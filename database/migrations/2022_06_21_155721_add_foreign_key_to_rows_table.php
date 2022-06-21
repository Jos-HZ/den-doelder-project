<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rows', function (Blueprint $table) {
            $table->unsignedBigInteger('column_id')->nullable();
            $table->foreign('column_id')->references('id')->on('columns');

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
        Schema::table('rows', function (Blueprint $table) {
            $table->dropForeign(['column_id']);
            $table->dropColumn('column_id');

            $table->dropForeign(['pre_control_id']);
            $table->dropColumn('pre_control_id');
        });
    }
}
