<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Backlog extends Model
{
    use HasFactory;
    use filterable;

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

    /**
     * calculate time between created_at and resolved_at in minutes
     *
     * @return int|null
     */
    public function timeDiffrence(): null|int
    {
        // TODO: kan een error meerdere dagen duren
        if ($this->resolved_at === null) {
            return null;
        } else {
            $time = Carbon::parse($this->created_at)->floatDiffInMinutes($this->resolved_at);
            return round($time, 1, PHP_ROUND_HALF_UP);
        }
    }
}
