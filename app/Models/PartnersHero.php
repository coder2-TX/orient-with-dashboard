<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnersHero extends Model
{
    protected $fillable = [
        'lead_text_ar',
        'lead_text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
