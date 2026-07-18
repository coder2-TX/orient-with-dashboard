<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'hero_image_en',
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
        $record = static::query()
            ->oldest('id')
            ->first();

        if (! $record) {
            $record = static::query()->create(
                static::defaultContent()
            );
        }

        $record->fillMissingDefaultText();
        $record->fillDefaultImagesIfEmpty();

        return $record->refresh();
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
            'hero_image_en' => null,

            'is_active' => true,
        ];
    }

    public function fillMissingDefaultText(): self
    {
        $defaults = static::defaultContent();
        $updates = [];

        foreach ([
            'title_ar',
            'title_en',
            'pre_ar',
            'pre_en',
            'company_ar',
            'company_en',
        ] as $field) {
            if (blank($this->getAttribute($field))) {
                $updates[$field] = $defaults[$field];
            }
        }

        if ($this->is_active === null) {
            $updates['is_active'] = true;
        }

        if ($updates !== []) {
            $this->forceFill($updates)->save();
        }

        return $this;
    }

    public function fillDefaultImagesIfEmpty(): self
    {
        $updates = [];

        if (blank($this->hero_image)) {
            $defaultArabicImage =
                static::defaultImageStoragePath('ar');

            if ($defaultArabicImage !== null) {
                $updates['hero_image'] = $defaultArabicImage;
            }
        }

        if (blank($this->hero_image_en)) {
            $defaultEnglishImage =
                static::defaultImageStoragePath('en');

            if ($defaultEnglishImage !== null) {
                $updates['hero_image_en'] = $defaultEnglishImage;
            }
        }

        if ($updates !== []) {
            $this->forceFill($updates)->save();
        }

        return $this;
    }

    public function imageUrlFor(string $locale): string
    {
        $field = $locale === 'en'
            ? 'hero_image_en'
            : 'hero_image';

        $storedPath = trim(
            (string) $this->getAttribute($field)
        );

        if (
            $storedPath !== ''
            && Storage::disk('public')->exists($storedPath)
        ) {
            return Storage::disk('public')->url($storedPath);
        }

        return static::publicDefaultImageUrl($locale);
    }

    public static function defaultImageStoragePath(
        string $locale = 'ar'
    ): ?string {
        $publicDirectory = $locale === 'en'
            ? 'assets/images/main/hero_en'
            : 'assets/images/main/hero';

        $storageDirectory = $locale === 'en'
            ? 'contact/hero/default/en'
            : 'contact/hero/default/ar';

        foreach (
            ['jpg', 'jpeg', 'png', 'webp', 'svg'] as $extension
        ) {
            $publicRelativePath =
                "{$publicDirectory}/1.{$extension}";

            $sourcePath = public_path($publicRelativePath);

            if (! file_exists($sourcePath)) {
                continue;
            }

            $storagePath =
                "{$storageDirectory}/1.{$extension}";

            if (
                ! Storage::disk('public')
                    ->exists($storagePath)
            ) {
                Storage::disk('public')->put(
                    $storagePath,
                    file_get_contents($sourcePath)
                );
            }

            return $storagePath;
        }

        return null;
    }

    public static function publicDefaultImageUrl(
        string $locale = 'ar'
    ): string {
        $publicDirectory = $locale === 'en'
            ? 'assets/images/main/hero_en'
            : 'assets/images/main/hero';

        foreach (
            ['jpg', 'jpeg', 'png', 'webp', 'svg'] as $extension
        ) {
            $publicRelativePath =
                "{$publicDirectory}/1.{$extension}";

            if (file_exists(public_path($publicRelativePath))) {
                return asset($publicRelativePath);
            }
        }

        return asset(
            $locale === 'en'
                ? 'assets/images/main/hero_en/1.jpg'
                : 'assets/images/main/hero/1.png'
        );
    }
}
