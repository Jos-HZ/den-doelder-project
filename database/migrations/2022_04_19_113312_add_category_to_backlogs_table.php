<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToBacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backlogs', function (Blueprint $table) {
            $table->set('category', ['technical', 'mechanical']); // waarom set als je er ÉÉN MOET kiezen, zou enum niet beter geweest zijn dan?

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backlogs', function (Blueprint $table) {
            //
        });
    }
}
