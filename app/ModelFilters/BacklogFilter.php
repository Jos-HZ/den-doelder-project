<?php

namespace App\ModelFilters;

use App\Models\Order;
use EloquentFilter\ModelFilter;

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
        $order = Order::where('production_line_id', $cape)->pluck('id');

        return $this->whereIn('order_id', $order);
    }
}
