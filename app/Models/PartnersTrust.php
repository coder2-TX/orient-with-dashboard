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

    public static function defaultItems(): array
    {
        return [
            [
                'icon_class' => 'fa-solid fa-map-location-dot',
                'title_ar' => 'خبرة عميقة',
                'desc_ar' => 'بالسوق اليمني',
                'title_en' => 'Deep expertise',
                'desc_en' => 'in the Yemeni market',
            ],
            [
                'icon_class' => 'fa-solid fa-route',
                'title_ar' => 'شبكة توزيع',
                'desc_ar' => 'فعّالة تغطي عدة مناطق',
                'title_en' => 'Distribution network',
                'desc_en' => 'covering multiple regions',
            ],
            [
                'icon_class' => 'fa-solid fa-circle-check',
                'title_ar' => 'التزام عالي',
                'desc_ar' => 'بالجودة والمعايير',
                'title_en' => 'High commitment',
                'desc_en' => 'to quality and standards',
            ],
            [
                'icon_class' => 'fa-solid fa-handshake',
                'title_ar' => 'شراكات طويلة',
                'desc_ar' => 'المدى',
                'title_en' => 'Long-term partnerships',
                'desc_en' => 'built to last',
            ],
            [
                'icon_class' => 'fa-solid fa-user-tie',
                'title_ar' => 'وضوح واحترافية',
                'desc_ar' => 'في التعامل',
                'title_en' => 'Clarity & professionalism',
                'desc_en' => 'in communication',
            ],
        ];
    }

    public static function iconOptions(): array
    {
        return [
            'fa-solid fa-map-location-dot' => 'خريطة / موقع السوق',
            'fa-solid fa-route' => 'مسار / شبكة توزيع',
            'fa-solid fa-circle-check' => 'اعتماد / التزام',
            'fa-solid fa-handshake' => 'شراكة / اتفاق',
            'fa-solid fa-user-tie' => 'احترافية / إدارة',
            'fa-solid fa-award' => 'جودة / تميز',
            'fa-solid fa-chart-line' => 'نمو / أداء',
            'fa-solid fa-people-group' => 'فريق / شراكات',
            'fa-solid fa-warehouse' => 'مستودعات / لوجستيات',
            'fa-solid fa-truck' => 'توزيع / شحن',
        ];
    }

    public static function activeContent(): ?self
    {
        return static::query()
            ->where('is_active', true)
            ->orderBy('sort')
            ->orderByDesc('id')
            ->first();
    }

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->orderBy('sort')->oldest('id')->first();

        if (! $record) {
            return static::query()->create([
                'items' => static::defaultItems(),
                'is_active' => true,
                'sort' => 1,
            ]);
        }

        if (! is_array($record->items) || count($record->items) === 0) {
            $record->forceFill([
                'items' => static::defaultItems(),
                'sort' => $record->sort ?: 1,
            ])->save();
        }

        return $record;
    }

    public static function repairTrustIcons(): void
    {
        $record = static::firstOrCreateDefault();
        $defaults = static::defaultItems();
        $currentItems = is_array($record->items) ? array_values($record->items) : [];
        $normalized = [];

        for ($index = 0; $index < 5; $index++) {
            $current = $currentItems[$index] ?? [];
            $default = $defaults[$index];

            $oldIcon = $current['icon'] ?? null;
            $customIcon = $current['custom_icon'] ?? null;

            if (! $customIcon && is_string($oldIcon) && $oldIcon !== '' && ! str_starts_with($oldIcon, 'fa-')) {
                $customIcon = $oldIcon;
            }

            $iconClass = $current['icon_class'] ?? null;
            if (! $iconClass && is_string($oldIcon) && str_starts_with($oldIcon, 'fa-')) {
                $iconClass = $oldIcon;
            }

            $item = [
                'icon_class' => $iconClass ?: $default['icon_class'],
                'title_ar' => $current['title_ar'] ?? $default['title_ar'],
                'desc_ar' => $current['desc_ar'] ?? $default['desc_ar'],
                'title_en' => $current['title_en'] ?? $default['title_en'],
                'desc_en' => $current['desc_en'] ?? $default['desc_en'],
            ];

            if ($customIcon) {
                $item['custom_icon'] = $customIcon;
            }

            $normalized[] = $item;
        }

        $record->forceFill([
            'items' => $normalized,
            'sort' => $record->sort ?: 1,
        ])->save();
    }
}
