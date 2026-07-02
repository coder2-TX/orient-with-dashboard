<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AboutValue extends Model
{
    protected $fillable = [
        'title_text_ar',
        'title_text_en',
        'intro_text_ar',
        'intro_text_en',
        'items',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
    ];

    public const DEFAULT_TITLE_AR = 'قيمنا';
    public const DEFAULT_TITLE_EN = 'Our Values';

    public const DEFAULT_INTRO_AR = 'ترتكز أعمال أورينت يمن على مجموعة من القيم التي تشكّل أساس تعاملاتها.';
    public const DEFAULT_INTRO_EN = "Orient Yemen’s work is guided by a set of core values that shape how we do business.";

    public static function activeContent(): self
    {
        static $activeRecord = null;

        if ($activeRecord instanceof self) {
            return $activeRecord;
        }

        $activeRecord = static::query()
            ->where('is_active', true)
            ->latest('id')
            ->first();

        return $activeRecord ?: static::defaultInstance();
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if (! $record) {
            return static::query()->create([
                'title_text_ar' => static::DEFAULT_TITLE_AR,
                'title_text_en' => static::DEFAULT_TITLE_EN,
                'intro_text_ar' => static::DEFAULT_INTRO_AR,
                'intro_text_en' => static::DEFAULT_INTRO_EN,
                'items' => static::defaultItems(),
                'is_active' => true,
            ]);
        }

        $items = is_array($record->items) ? array_values($record->items) : [];
        $defaultItems = static::defaultItems();

        if (count($items) < 5) {
            $items = array_merge($items, array_slice($defaultItems, count($items)));
        }

        $items = array_slice($items, 0, 6);

        $updates = [];

        if (blank($record->title_text_ar ?? null)) {
            $updates['title_text_ar'] = static::DEFAULT_TITLE_AR;
        }

        if (blank($record->title_text_en ?? null)) {
            $updates['title_text_en'] = static::DEFAULT_TITLE_EN;
        }

        if (blank($record->intro_text_ar)) {
            $updates['intro_text_ar'] = static::DEFAULT_INTRO_AR;
        }

        if (blank($record->intro_text_en)) {
            $updates['intro_text_en'] = static::DEFAULT_INTRO_EN;
        }

        if ($record->items !== $items) {
            $updates['items'] = $items;
        }

        if ($updates !== []) {
            $record->forceFill($updates)->save();
            $record->refresh();
        }

        return $record;
    }

    public static function defaultInstance(): self
    {
        return new static([
            'title_text_ar' => static::DEFAULT_TITLE_AR,
            'title_text_en' => static::DEFAULT_TITLE_EN,
            'intro_text_ar' => static::DEFAULT_INTRO_AR,
            'intro_text_en' => static::DEFAULT_INTRO_EN,
            'items' => static::defaultItems(),
            'is_active' => false,
        ]);
    }

    public static function defaultItems(): array
    {
        return [
            [
                'icon' => static::ensureDefaultIcon('professionalism.svg', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#f58220" d="M22 18h20v8h14v28H8V26h14v-8Zm4 8h12v-4H26v4Zm-2 14H12v10h40V40H40v4H24v-4Zm0-10H12v6h12v-2h16v2h12v-6H40v2H24v-2Z"/></svg>'),
                'title_ar' => 'الاحترافية',
                'desc_ar' => 'في إدارة الأعمال',
                'title_en' => 'Professionalism',
                'desc_en' => 'in business management',
            ],
            [
                'icon' => static::ensureDefaultIcon('transparency.svg', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#f58220" d="M32 10c13 0 23 13 27 22-4 9-14 22-27 22S9 41 5 32c4-9 14-22 27-22Zm0 8c-8 0-15 7-19 14 4 7 11 14 19 14s15-7 19-14c-4-7-11-14-19-14Zm0 5a9 9 0 1 1 0 18 9 9 0 0 1 0-18Z"/></svg>'),
                'title_ar' => 'الشفافية',
                'desc_ar' => 'في التعامل',
                'title_en' => 'Transparency',
                'desc_en' => 'in our dealings',
            ],
            [
                'icon' => static::ensureDefaultIcon('commitment.svg', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#f58220" d="M32 6 39 21l16 2-12 11 3 16-14-8-14 8 3-16L9 23l16-2 7-15Zm0 13-3 7-8 1 6 5-2 8 7-4 7 4-2-8 6-5-8-1-3-7Z"/></svg>'),
                'title_ar' => 'الالتزام',
                'desc_ar' => 'بالجودة والاستمرارية',
                'title_en' => 'Commitment',
                'desc_en' => 'to quality and continuity',
            ],
            [
                'icon' => static::ensureDefaultIcon('flexibility.svg', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#f58220" d="M18 18h26l-6-6 4-4 14 14-14 14-4-4 6-6H18a8 8 0 0 0 0 16h6v8h-6a16 16 0 0 1 0-32Zm28 28H20l6 6-4 4L8 42l14-14 4 4-6 6h26a8 8 0 0 0 0-16h-6v-8h6a16 16 0 0 1 0 32Z"/></svg>'),
                'title_ar' => 'المرونة',
                'desc_ar' => 'في التكيّف مع متغيرات الأسواق',
                'title_en' => 'Flexibility',
                'desc_en' => 'to adapt to market changes',
            ],
            [
                'icon' => static::ensureDefaultIcon('partnership.svg', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#f58220" d="M20 20h10l6 6 4-4h8c5 0 9 4 9 9v5h-8v-5c0-1-1-2-2-2h-4L31 41l-9-9h-2c-1 0-2 1-2 2v2h-8v-2c0-8 5-14 10-14Zm18 24 8-8 6 6-8 8c-4 4-10 4-14 0L12 32l6-6 18 18c1 1 2 1 2 0Z"/></svg>'),
                'title_ar' => 'الشراكة',
                'desc_ar' => 'كأساس للنجاح المشترك',
                'title_en' => 'Partnership',
                'desc_en' => 'as the foundation of shared success',
            ],
        ];
    }

    protected static function ensureDefaultIcon(string $filename, string $svg): string
    {
        $path = "about/values/icons/default/{$filename}";

        if (! Storage::disk('public')->exists($path)) {
            Storage::disk('public')->put($path, $svg);
        }

        return $path;
    }
}
