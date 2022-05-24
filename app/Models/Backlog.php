<?php

namespace App\Models;

use App\Filters\CategoryFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
//
//    public function scopeFilter(Builder $builder, $request)
//    {
//        return (new CategoryFilter($request))->filter($builder);
//    }
}
