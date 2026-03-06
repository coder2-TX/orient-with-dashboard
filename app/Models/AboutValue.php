<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutValue extends Model
{
    protected $fillable = [
        'intro_text_ar',
        'intro_text_en',
        'items',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
    ];
}
