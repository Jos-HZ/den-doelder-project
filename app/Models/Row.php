<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    protected $fillable = [
        'correct',
        'changed_to',
        'treated',
        'humidity',
        'column_id',
        'pre_control_id'
    ];

    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    public function pre_control()
    {
       return $this->belongsTo(PreControl::class);
    }
}
