<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('production_line')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.j
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_lines');
    }
}
