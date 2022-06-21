<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // upper deck rows
        $upper_deck = [
            'measurement',
            'number_of_planks',
            'stringer_boards',
            'fungi',
            'waan '
        ];

        $upper_deck_category_id = DB::table('categories')->where('category', 'upper_deck')->value('id');

        foreach($upper_deck as $row) {
            DB::table('rows')->insert([
                'row' => $row,
                'category_id' => $upper_deck_category_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Blocks rows
        $blocks = [
            'kind',
            'beam',
            'measurement_1',
            'measurement_2',
        ];

        $blocks_category_id = DB::table('categories')->where('category', 'blocks')->value('id');

        foreach($blocks as $row) {
            DB::table('rows')->insert([
                'row' => $row,
                'category_id' => $blocks_category_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // bottom deck rows
        $bottom_deck = [
            'bridge',
            'runner_msm_2',
            'runner_msm_3',
            'cross_deck',
            'elements',
            'double_deck',
        ];

        $bottom_deck_category_id = DB::table('categories')->where('category', 'bottom_deck')->value('id');

        foreach($bottom_deck as $row) {
            DB::table('rows')->insert([
                'row' => $row,
                'category_id' => $bottom_deck_category_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // remaining rows
        $remaining_rows = [
            'corners_cut',
            'extra_stamp',
            'stack_height',
            'marks',
            'q_hangar_a_choice',
            'special_instructions'
        ];

        $remaining_rows_category_id = DB::table('categories')->where('category', 'remaining_rows')->value('id');

        foreach($remaining_rows as $row) {
            DB::table('rows')->insert([
                'row' => $row,
                'category_id' => $remaining_rows_category_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
