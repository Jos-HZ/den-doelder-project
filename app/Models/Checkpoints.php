<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkpoints extends Model
{
    use HasFactory;

    /**
     * Get the rubric associated with the checkpoints.
     */
    public function rubric(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Rubric::class);
    }
}
