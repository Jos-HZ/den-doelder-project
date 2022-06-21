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
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->enum('column', [
                // upper deck rows
                'measurement',
                'number_of_planks',
                'stringer_boards',
                'fungi',
                'waan',

                // blocks rows
                'kind',
                'beam',
                'measurement_1',
                'measurement_2',

                // bottom deck rows
                'bridge',
                'runner_msm_2',
                'runner_msm_3',
                'cross_deck',
                'elements',
                'double_deck',

                // remaining rows
                'corners_cut',
                'extra_stamp',
                'stack_height',
                'marks',
                'q_hangar_a_choice',
                'special_instructions'
            ]);
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
        Schema::dropIfExists('columns');
    }
}
