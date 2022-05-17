<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_pallet',
        'time',
        'def_nr',
        'action',
        'deviation',
        'extra_info',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function production()
    {
        return $this->belongsTo(Production::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
