<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCheckpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkpoints', function (Blueprint $table) {
            $table->unsignedBigInteger('rubrics_id');
            $table->foreign('rubrics_id')->references('id')->on('rubrics')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkpoints', function (Blueprint $table) {
            $table->dropColumn('rubrics');
        });
    }
}
