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

    public function error()
    {
        return $this->hasMany(Error::class);
    }

    public function quality()
    {
        return $this->hasMany(QualityControl::class);
    }
}

