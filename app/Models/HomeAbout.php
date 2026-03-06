<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    protected $fillable = [
        'body',
        'is_active',
    ];

    protected $casts = [
        'body' => 'array',
        'is_active' => 'boolean',
    ];
}
