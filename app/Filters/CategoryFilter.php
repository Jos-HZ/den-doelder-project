<?php

// CategoryFilter.php

namespace App\Filters;

class CategoryFilter extends AbstractFilter
{
    protected array $filters = [
        'category' => TypeFilter::class
    ];
}
