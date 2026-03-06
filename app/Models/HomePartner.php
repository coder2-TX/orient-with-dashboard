<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePartner extends Model
{
    protected $fillable = [
        'subtitle_ar',
        'subtitle_en',
        'logos',
        'is_active',
        'sort',
    ];

    protected $casts = [
        'logos' => 'array',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];
}
