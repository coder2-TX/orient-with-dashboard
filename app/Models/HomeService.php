<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeService extends Model
{
    protected $fillable = [
        'intro',
        'items',
        'is_active',
    ];

    protected $casts = [
        'intro' => 'array',
        'items' => 'array',
        'is_active' => 'boolean',
    ];
}
