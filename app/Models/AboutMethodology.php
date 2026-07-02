<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMethodology extends Model
{
    protected $fillable = [
        'items',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
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
            $record = new static([
                'items' => static::defaultItems(),
                'is_active' => true,
            ]);
        }

        $record->items = static::normalizeItems($record->items);

        return static::$activeContentCache = $record;
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if (! $record) {
            return static::query()->create([
                'items' => static::defaultItems(),
                'is_active' => true,
            ]);
        }

        $items = static::normalizeItems($record->items);

        if ($record->items !== $items) {
            $record->forceFill(['items' => $items])->save();
        }

        return $record;
    }

    public static function repairMethodologyIcons(): self
    {
        $record = static::firstOrCreateDefault();
        $defaults = static::defaultItems();
        $currentItems = is_array($record->items) ? array_values($record->items) : [];
        $items = [];

        foreach ($defaults as $index => $defaultItem) {
            $currentItem = $currentItems[$index] ?? [];

            if (! is_array($currentItem)) {
                $currentItem = [];
            }

            $items[] = [
                'icon_class' => $defaultItem['icon_class'],
                'custom_icon' => $currentItem['custom_icon'] ?? null,
                'title_ar' => $currentItem['title_ar'] ?? $defaultItem['title_ar'],
                'desc_ar' => $currentItem['desc_ar'] ?? $defaultItem['desc_ar'],
                'title_en' => $currentItem['title_en'] ?? $defaultItem['title_en'],
                'desc_en' => $currentItem['desc_en'] ?? $defaultItem['desc_en'],
            ];
        }

        $record->forceFill(['items' => $items])->save();

        return $record;
    }

    public static function normalizeItems(?array $items): array
    {
        $defaults = static::defaultItems();
        $items = is_array($items) ? array_values($items) : [];
        $normalized = [];

        foreach ($defaults as $index => $defaultItem) {
            $item = $items[$index] ?? [];

            if (! is_array($item)) {
                $item = [];
            }

            $normalized[] = [
                'icon_class' => $item['icon_class'] ?? $defaultItem['icon_class'],
                'custom_icon' => $item['custom_icon'] ?? null,
                'title_ar' => $item['title_ar'] ?? $defaultItem['title_ar'],
                'desc_ar' => $item['desc_ar'] ?? $defaultItem['desc_ar'],
                'title_en' => $item['title_en'] ?? $defaultItem['title_en'],
                'desc_en' => $item['desc_en'] ?? $defaultItem['desc_en'],
            ];
        }

        return $normalized;
    }

    public static function iconOptions(): array
    {
        return [
            'fa-solid fa-magnifying-glass-chart' => 'دراسة الأسواق',
            'fa-solid fa-people-group' => 'اختيار الشراكات',
            'fa-solid fa-diagram-project' => 'التخطيط المنظّم',
            'fa-solid fa-chart-line' => 'المتابعة المستمرة',
            'fa-solid fa-handshake' => 'علاقات طويلة الأمد',
            'fa-solid fa-briefcase' => 'احترافية',
            'fa-solid fa-hand-holding-heart' => 'شفافية',
            'fa-solid fa-award' => 'التزام',
            'fa-solid fa-arrows-rotate' => 'مرونة',
            'fa-solid fa-store' => 'متجر',
            'fa-solid fa-truck' => 'توزيع',
            'fa-solid fa-warehouse' => 'مستودع',
            'fa-solid fa-users' => 'فريق',
            'fa-solid fa-bullseye' => 'هدف',
            'fa-regular fa-eye' => 'رؤية',
        ];
    }

    public static function defaultItems(): array
    {
        return [
            [
                'icon_class' => 'fa-solid fa-magnifying-glass-chart',
                'custom_icon' => null,
                'title_ar' => 'دراسة الأسواق',
                'desc_ar' => 'قبل دخول أي منتج',
                'title_en' => 'Market research',
                'desc_en' => 'before launching any product',
            ],
            [
                'icon_class' => 'fa-solid fa-people-group',
                'custom_icon' => null,
                'title_ar' => 'اختيار الشراكات',
                'desc_ar' => 'التجارية بعناية',
                'title_en' => 'Selecting partnerships',
                'desc_en' => 'with great care',
            ],
            [
                'icon_class' => 'fa-solid fa-diagram-project',
                'custom_icon' => null,
                'title_ar' => 'التخطيط المنظّم',
                'desc_ar' => 'لدخول المنتجات',
                'title_en' => 'Structured planning',
                'desc_en' => 'for market entry',
            ],
            [
                'icon_class' => 'fa-solid fa-chart-line',
                'custom_icon' => null,
                'title_ar' => 'المتابعة المستمرة',
                'desc_ar' => 'لأداء المنتجات',
                'title_en' => 'Continuous follow-up',
                'desc_en' => 'on product performance',
            ],
            [
                'icon_class' => 'fa-solid fa-handshake',
                'custom_icon' => null,
                'title_ar' => 'علاقات طويلة الأمد',
                'desc_ar' => 'مع الشركاء والعملاء',
                'title_en' => 'Long-term relationships',
                'desc_en' => 'with partners and customers',
            ],
        ];
    }
}
