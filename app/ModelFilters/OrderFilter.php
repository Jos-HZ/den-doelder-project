<?php

namespace App\ModelFilters;

use App\Models\Order;
use EloquentFilter\ModelFilter;

class OrderFilter extends ModelFilter
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
     * @param $cape
     * @return OrderFilter
     */
    public function cape($cape): OrderFilter
    {
        return $this->where('production_line_id', $cape);
    }
}
