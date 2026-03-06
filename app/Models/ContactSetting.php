<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'whatsapp_display',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
