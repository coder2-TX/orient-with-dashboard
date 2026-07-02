<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeService extends Model
{
    protected $fillable = [
        'intro',
        'items',
        'is_active',
    ];

    protected $casts = [
        'intro' => 'array',
        'items' => 'array',
        'is_active' => 'boolean',
    ];

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->oldest('id')->first();

        if (! $record) {
            return static::query()->create([
                'intro' => static::defaultIntro(),
                'items' => static::dashboardDefaultItems(),
                'is_active' => false,
            ]);
        }

        $updates = [];

        if (! is_array($record->intro) || empty($record->intro['ar']) || empty($record->intro['en'])) {
            $updates['intro'] = static::defaultIntro();
        }

        if (! is_array($record->items) || count(array_filter($record->items)) === 0) {
            $updates['items'] = static::dashboardDefaultItems();
        }

        if ($updates !== []) {
            $record->fill($updates);
            $record->save();
            $record->refresh();
        }

        return $record;
    }

    public static function managedRecord(): ?self
    {
        return static::query()->oldest('id')->first();
    }

    public static function defaultIntro(): array
    {
        return [
            'ar' => 'نقدّم منظومة متكاملة من الخدمات التي تغطي مختلف مراحل عمل المنتج:',
            'en' => 'We provide an integrated set of services covering every stage of a product’s journey:',
        ];
    }

    public static function defaultItems(): array
    {
        return [
            [
                'icon' => 'assets/images/main/service%20icon/Import.svg',
                'title' => [
                    'ar' => 'استيراد بمعايير عالمية',
                    'en' => 'World-class importing',
                ],
                'icon_file' => 'Import.svg',
            ],
            [
                'icon' => 'assets/images/main/service%20icon/Strategy.svg',
                'title' => [
                    'ar' => 'التسويق التجاري الذكي',
                    'en' => 'Smart trade marketing',
                ],
                'icon_file' => 'Strategy.svg',
            ],
            [
                'icon' => 'assets/images/main/service%20icon/Distribution.svg',
                'title' => [
                    'ar' => 'دعم التوزيع والتواجد',
                    'en' => 'Distribution & presence support',
                ],
                'icon_file' => 'Distribution.svg',
            ],
            [
                'icon' => 'assets/images/main/service%20icon/Branding.svg',
                'title' => [
                    'ar' => 'تطوير الهوية التجارية',
                    'en' => 'Brand identity development',
                ],
                'icon_file' => 'Branding.svg',
            ],
        ];
    }

    public static function dashboardDefaultItems(): array
    {
        return array_map(function (array $item): array {
            return [
                'icon' => static::copyDefaultIconToStorage($item['icon_file']) ?? $item['icon'],
                'title' => $item['title'],
            ];
        }, static::defaultItems());
    }

    private static function copyDefaultIconToStorage(string $fileName): ?string
    {
        $source = public_path("assets/images/main/service icon/{$fileName}");

        if (! File::exists($source)) {
            return null;
        }

        $destination = "home/services/icons/default/{$fileName}";

        if (! Storage::disk('public')->exists($destination)) {
            Storage::disk('public')->put($destination, File::get($source));
        }

        return $destination;
    }
}
