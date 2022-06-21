<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows', function (Blueprint $table) {
            $table->id();
            $table->enum('row', ['measurement', 'number_of_planks', 'stringer_boards', 'fungi', 'waan', 'kind', 'runner_msm_2', 'runner_msm_3', 'cross_deck', 'elements', 'double_deck', 'corners_cut', 'extra_stamp', 'stack_height', 'marks', 'q_hangar_a_choice', 'special_instructions']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rows');
    }
}
