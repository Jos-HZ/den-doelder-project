<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Backlog extends Model
{
    use HasFactory, filterable;

    public $fillable = [
        'order_id',
        'time',
        'date',
        'description',
        'category',
        'language'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * calculate time between created_at and resolved_at in minutes
     *
     * @return int|null
     */
    public function timeDifference(): null|int
    {
        $time = Carbon::parse($this->time)->floatDiffInMinutes
        ($this->resolved_at);
        return round($time);
    }
}
