<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnersTrust extends Model
{
    protected $fillable = [
        'items',
        'is_active',
        'sort',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];
}
