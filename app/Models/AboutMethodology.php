<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMethodology extends Model
{
    protected $fillable = [
        'items',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
    ];
}
