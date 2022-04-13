<?php

// CategoryFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    protected array $filters = [
        'category' => TypeFilter::class
    ];
}
