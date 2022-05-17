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

            $table->unsignedBigInteger('production_line');
            $table->foreign('production_line')->references('production_line')->on('productions');
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
            $table->dropForeign(['ordernumber', 'production_line']);
            $table->dropColumn('ordernumber', 'production_line');
        });
    }
}
