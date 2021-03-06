<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToControlRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('control_rows', function (Blueprint $table) {
            $table->unsignedBigInteger('control_id')->nullable();
            $table->foreign('control_id')->references('id')->on('controls');

            $table->unsignedBigInteger('column_id')->nullable();
            $table->foreign('column_id')->references('id')->on('columns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('control_rows', function (Blueprint $table) {
            $table->dropForeign(['control_id']);
            $table->dropColumn('control_id');

            $table->dropForeign(['column_id']);
            $table->dropColumn('column_id');
        });
    }
}
