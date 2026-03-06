<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeWhy extends Model
{
    protected $table = 'home_why_items';

    protected $fillable = [
        'sort_order',
        'text_ar',
        'text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
