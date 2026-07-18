<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HomeFooter extends Model
{
    protected static ?self $activeDefaultCache = null;

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
        return static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();
    }

    public static function activeOrDefault(): self
    {
        if (static::$activeDefaultCache instanceof self) {
            return static::$activeDefaultCache;
        }

        static::$activeDefaultCache = static::activeContent()
            ?? new static(static::defaultData());

        return static::$activeDefaultCache;
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (! $record) {
            $record = static::query()
                ->latest('id')
                ->first();
        }

        if (! $record) {
            return static::query()->create(static::defaultData());
        }

        $defaults = static::defaultData();

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
            if (static::isBlank($record->{$field}) && ! static::isBlank($defaults[$field] ?? null)) {
                $record->{$field} = $defaults[$field];
            }
        }

        if (! static::hasUsableLocations($record->locations)) {
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

    public function emailAddress(): string
    {
        $email = preg_replace('/\s+/', '', trim((string) ($this->email ?: static::defaultData()['email'])));

        return $email !== '' ? $email : static::defaultData()['email'];
    }

    public function phoneDisplay(): string
    {
        return trim((string) ($this->phone ?: static::defaultData()['phone']));
    }

    public function phoneTel(): string
    {
        return static::cleanPhoneForTel($this->phoneDisplay());
    }

    public function whatsappUrl(): string
    {
        $value = trim((string) ($this->whatsapp_url ?: static::defaultData()['whatsapp_url']));

        if ($value === '') {
            return static::defaultData()['whatsapp_url'];
        }

        if (Str::startsWith($value, ['http://', 'https://'])) {
            return $value;
        }

        $digits = preg_replace('/\D+/', '', $value);

        return $digits !== ''
            ? 'https://wa.me/' . $digits
            : static::defaultData()['whatsapp_url'];
    }

    public function whatsappDigits(): string
    {
        $digits = preg_replace('/\D+/', '', $this->whatsappUrl());

        return $digits !== '' ? $digits : '967778080700';
    }

    public function whatsappDisplay(): string
    {
        $digits = $this->whatsappDigits();

        if (strlen($digits) === 12 && Str::startsWith($digits, '967')) {
            return sprintf(
                '+967 %s %s %s',
                substr($digits, 3, 3),
                substr($digits, 6, 3),
                substr($digits, 9, 3),
            );
        }

        return '+' . $digits;
    }

    public function locationsFor(string $locale): array
    {
        $locations = $this->locations;

        if (! static::hasUsableLocations($locations)) {
            $locations = static::defaultLocations();
        }

        return collect($locations)
            ->map(fn (array $location): ?string => $location["name_{$locale}"] ?? null)
            ->filter(fn (?string $name): bool => filled($name))
            ->map(fn (string $name): string => trim($name))
            ->values()
            ->all();
    }

    public static function cleanPhoneForTel(string $phone): string
    {
        $phone = trim($phone);

        if ($phone === '') {
            return '';
        }

        $hasPlus = Str::startsWith($phone, '+');
        $digits = preg_replace('/\D+/', '', $phone);

        return ($hasPlus ? '+' : '') . $digits;
    }

    protected static function isBlank(mixed $value): bool
    {
        if ($value === null) {
            return true;
        }

        return is_string($value) && trim($value) === '';
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
