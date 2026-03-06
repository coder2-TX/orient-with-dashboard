<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFooter extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'location_text_ar',
        'location_text_en',
        'location_url',
        'locations',
        'x_url',
        'facebook_url',
        'whatsapp_url',
        'is_active',
    ];

    protected $casts = [
        'locations' => 'array',
        'is_active' => 'boolean',
    ];
}
