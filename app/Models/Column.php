<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    public function row()
    {
        return $this->hasMany(Row::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function column_name()
    {
        return match ($this->column) {
            // upper deck rows
            'measurement' => 'Measurement',
            'number_of_planks' => 'Number of planks',
            'stringer_boards' => 'Stringer boards',
            'fungi' => 'Fungi',
            'waan' => 'Waan',

                // blocks rows
            'kind' => 'Kind (Chip/Wood)',
            'beam' => 'Beam',
            'measurement_1' => 'Measurement 1',
            'measurement_2' => 'Measurement 2',

                // bottom deck rows
            'bridge' => 'Bridge',
            'runner_msm_2' => 'Runner Msm (2x)',
            'runner_msm_3'=> 'Runner Msm (3x)',
            'cross_deck' => 'Cross deck',
            'elements' => 'Elements',
            'double_deck' => 'Double deck',

                // remaining columns
            'corners_cut' => 'Corners cut',
            'extra_stamp' => 'Extra stamp',
            'stack_height'=> 'Stack height',
            'marks' => 'Strappen / Marks',
            'q_hangar_a_choice' => 'Q (Room) / hangar /A ',
            'special_instructions' => 'Special instructions',
            default => $this->column,
        };
    }
}
