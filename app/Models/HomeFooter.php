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
        'instagram_url',
        'whatsapp_url',
        'is_active',
    ];

    protected $casts = [
        'locations' => 'array',
        'is_active' => 'boolean',
    ];

    public static function defaultLocations(): array
    {
        return [
            [
                'name_ar' => 'اليمن',
                'name_en' => 'Yemen',
            ],
            [
                'name_ar' => 'المملكة العربية السعودية',
                'name_en' => 'Saudi Arabia',
            ],
            [
                'name_ar' => 'إندونيسيا',
                'name_en' => 'Indonesia',
            ],
        ];
    }

    public static function defaultData(): array
    {
        return [
            'email' => 'info@orientyemen.com',
            'phone' => '+967 734888880',
            'location_text_ar' => 'موقع الشركة',
            'location_text_en' => 'Company Location',
            'location_url' => 'https://maps.app.goo.gl/TW3M3gi3dqN273LG6',
            'locations' => self::defaultLocations(),
            'x_url' => null,
            'facebook_url' => 'https://www.facebook.com/share/1CNj9hfQ9o/',
            'instagram_url' => 'https://www.instagram.com/orientyemen?igsh=NHZqaTFsNDJmY2Jz',
            'whatsapp_url' => 'https://wa.me/967778080700',
            'is_active' => true,
        ];
    }

    public static function firstOrCreateDefault(): self
    {
        return self::query()->firstOrCreate([], self::defaultData());
    }
}
