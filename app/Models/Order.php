<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory, filterable;

    private static array $whiteListFilter = ['production_line_id'];

    public function production()
    {
        return $this->belongsTo(ProductionLine::class);
    }

    public function quality(): HasMany
    {
        return $this->hasMany(QualityControl::class);
    }

    public function backlog(): HasMany
    {
        return $this->hasMany(Backlog::class);
    }

    public function pre_control()
    {
        return $this->belongsTo(PreControl::class);
    }

    public function control()
    {
        return $this->belongsTo(Control::class);
    }

    /*
     * calculates the time between conversion_time and end_time in minutes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productionTime()
    {
        return round(Carbon::parse($this->start_time)->floatDiffInMinutes
        ($this->end_time));
    }

    /* calculate the time between start_time and conversion_time in minutes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversionTime()
    {
        return round(Carbon::parse($this->start_time)->floatDiffInMinutes
        ($this->conversion_time));
    }

    // calculate the time of all the errors per order
    public function errorTime()
    {
        $time = 0;
        foreach ($this->backlog as $backlog) {
            $time += $backlog->timeDifference();
        }
        return round($time);
    }

}


