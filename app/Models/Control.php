<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function preControl()
    {
        return $this->belongsTo(PreControl::class);
    }

    public function controlRows()
    {
        return $this->hasMany(ControlRow::class);
    }
}
