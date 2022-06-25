<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function column()
    {
        return $this->hasMany(Category::class);
    }

    public function category_name()
    {
        return match ($this->category) {
            'upper_deck' => "Upper deck",
            'blocks' => 'Blocks',
            'bottom_deck' => 'Bottom deck',
            'remaining_columns' =>  'Remaining columns',
            default => $this->category,
        };
    }
}
