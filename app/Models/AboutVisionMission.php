<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutVisionMission extends Model
{
    protected $fillable = [
        'intro_text_ar',
        'intro_text_en',
        'vision_text_ar',
        'vision_text_en',
        'mission_text_ar',
        'mission_text_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
