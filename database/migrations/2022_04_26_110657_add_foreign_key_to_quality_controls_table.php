<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToQualityControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quality_controls', function (Blueprint $table) {
            $table->unsignedBigInteger('ordernumber')->nullable();
            $table->foreign('ordernumber')->references('id')->on('orders');

            $table->unsignedBigInteger('production_line_id')->nullable();
            $table->foreign('production_line_id')->references('id')->on('productions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quality_controls', function (Blueprint $table) {
            $table->dropForeign(['production_line_id']);
            $table->dropForeign(['ordernumber']);
            $table->dropColumn('ordernumber', 'production_line_id');
        });
    }
}
