<?php

namespace App\ModelFilters;

use App\Models\Backlog;
use App\Models\Order;
use App\Models\Production;
use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\DB;

class BacklogFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    /**
     * This will filter category
     *
     * @param $category
     * @return BacklogFilter
     */
    public function category($category): BacklogFilter
    {
        return $this->where('category', $category);
    }

    /**
     * This will filter category
     *
     * @param $cape
     * @return BacklogFilter
     */
    public function cape($cape): BacklogFilter
    {
//        return $this->where('cape', '=', $cape);
//        $order_id = $this->order_id;
        $order = Order::where('production_line', $cape)->pluck('id');
//        dd(Order::where('production_line', $cape)->pluck('id'));

        return $this->whereIn('order_id', $order);
    }
}
