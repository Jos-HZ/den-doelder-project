<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'treated',
        'date',
        'submitted_by',
    ];
}
