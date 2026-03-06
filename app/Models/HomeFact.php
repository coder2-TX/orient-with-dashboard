<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFact extends Model
{
    protected $fillable = [
        'team_count',
        'vehicles_count',
        'warehouses_count',
        'pos_count',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
