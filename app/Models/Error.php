<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\CategoryFilter;

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

    public function scopeFilter(Builder $builder, $request)
    {
        return (new CategoryFilter($request))->filter($builder);
    }
}
