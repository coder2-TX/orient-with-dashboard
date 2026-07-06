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

    public static function activeContent(): ?self
    {
        return self::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();
    }

    public static function firstOrCreateDefault(): self
    {
        $record = self::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (! $record) {
            $record = self::query()
                ->latest('id')
                ->first();
        }

        if (! $record) {
            return self::query()->create(self::defaultData());
        }

        $defaults = self::defaultData();

        foreach ([
            'email',
            'phone',
            'location_text_ar',
            'location_text_en',
            'location_url',
            'facebook_url',
            'instagram_url',
            'whatsapp_url',
        ] as $field) {
            if (self::isBlank($record->{$field}) && ! self::isBlank($defaults[$field] ?? null)) {
                $record->{$field} = $defaults[$field];
            }
        }

        if (! self::hasUsableLocations($record->locations)) {
            $record->locations = $defaults['locations'];
        }

        if ($record->is_active === null) {
            $record->is_active = true;
        }

        if ($record->isDirty()) {
            $record->save();
        }

        return $record;
    }

    protected static function isBlank(mixed $value): bool
    {
        if ($value === null) {
            return true;
        }

        if (is_string($value)) {
            return trim($value) === '';
        }

        return false;
    }

    protected static function hasUsableLocations(mixed $locations): bool
    {
        if (! is_array($locations)) {
            return false;
        }

        foreach ($locations as $location) {
            if (! is_array($location)) {
                continue;
            }

            $nameAr = trim((string) ($location['name_ar'] ?? ''));
            $nameEn = trim((string) ($location['name_en'] ?? ''));

            if ($nameAr !== '' || $nameEn !== '') {
                return true;
            }
        }

        return false;
    }
}