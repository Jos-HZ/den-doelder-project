<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameOrdernumberInQualityControlsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quality_controls', function (Blueprint $table) {
            $table->dropForeign(['ordernumber']);
            $table->renameColumn('ordernumber', 'order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
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
            $table->dropForeign(['order_id']);
            $table->renameColumn('order_id', 'ordernumber');
            $table->foreign('ordernumber')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
        });
    }
}
