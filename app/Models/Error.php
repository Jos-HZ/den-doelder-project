<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;

class Error extends Model
{
    use HasFactory;

    public $fillable = [
        'order_id',
        'time',
        'date',
        'description'
        ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
