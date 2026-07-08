<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactHero extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'pre_ar',
        'pre_en',
        'company_ar',
        'company_en',
        'hero_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static ?self $activeContentCache = null;

    public static function activeContent(): self
    {
        if (static::$activeContentCache instanceof self) {
            return static::$activeContentCache;
        }

        $record = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        if (! $record) {
            $record = new static(static::defaultContent());
        }

        return static::$activeContentCache = $record;
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if (! $record) {
            return static::query()->create(static::defaultContent());
        }

        return $record;
    }

    public static function defaultContent(): array
    {
        return [
            'title_ar' => 'نـرحـب بـتـواصـلـكـم',
            'title_en' => 'WE’D LOVE TO HEAR FROM YOU',

            'pre_ar' => 'مـع',
            'pre_en' => 'WITH',

            'company_ar' => 'اوريـنـت يـمـن',
            'company_en' => 'ORIENT YEMEN',

            'hero_image' => null,

            'is_active' => true,
        ];
    }
}