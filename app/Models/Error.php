<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'time',
        'date',
        'description',
        'category'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
