<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    public $fillable = [
        'placements',
        'addition',
        'description',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
