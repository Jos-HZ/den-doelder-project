<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionLinesSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('production_lines')->insert([
            ['production_line' => '1'],
            ['production_line' => '2'],
            ['production_line' => '5']
        ]);
    }
}
