<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function production()
    {
        return $this->belongsTo(Production::class);
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
}

