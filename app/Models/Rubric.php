<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    use HasFactory;

    /**
     * Get the checkpoints associated with the rubric.
     */
    public function checkpoint(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Checkpoints::class);
    }

    public function checklist(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
