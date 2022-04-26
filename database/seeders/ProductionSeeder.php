<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productions')->insert([
            ['production_line' => 'cape1'],
            ['production_line' => 'cape2'],
            ['production_line' => 'cape5']
        ]);
    }
}
