<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'third_line',
        'experience_years',
        'slides',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'third_line' => 'array',
        'experience_years' => 'integer',
        'slides' => 'array',
        'is_active' => 'boolean',
    ];
}
