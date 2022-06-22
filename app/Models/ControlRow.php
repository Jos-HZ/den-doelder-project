<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'correct',
        'changed_to',
        'comment',
        'column_id',
        'control_id'
    ];

    public function controls()
    {
        return $this->hasMany(Row::class);
    }
}
