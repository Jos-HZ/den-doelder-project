<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function production()
    {
        return $this->belongsTo(ProductionLine::class);
    }

    public function error(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Error::class);
    }

    public function quality(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(QualityControl::class);
    }

    public function backlog(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Backlog::class);
    }
    /**
     * Get the checklist associated with the order.
     */
    public function checklist(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Checklist::class);
    }
}

