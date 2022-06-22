<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlRow extends Model
{
    use HasFactory;

    public function controls()
    {
        return $this->hasMany(Row::class);
    }
}
