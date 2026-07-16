<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeHero extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'third_line',
        'experience_years',
        'slides',
        'slides_en',
        'is_active',
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'third_line' => 'array',
        'experience_years' => 'integer',
        'slides' => 'array',
        'slides_en' => 'array',
        'is_active' => 'boolean',
    ];

    public static function defaultAttributes(): array
    {
        return [
            'title' => [
                'ar' => 'اوريـنـت يـمـن',
                'en' => 'ORIENT YEMEN',
            ],
            'subtitle' => [
                'ar' => null,
                'en' => null,
            ],
            'third_line' => [
                'ar' => 'وشـراكـات تـبـنـي الـمـسـتـقـبـل',
                'en' => 'Partnerships that shape the future',
            ],
            'experience_years' => 15,
            'slides' => static::defaultSlideStoragePaths('ar'),
            'slides_en' => static::defaultSlideStoragePaths('en'),
            'is_active' => false,
        ];
    }

    public static function firstOrCreateDefault(): self
    {
        $hero = static::query()
            ->oldest('id')
            ->first();

        if (! $hero) {
            return static::query()->create(
                static::defaultAttributes()
            );
        }

        $hero->fillMissingDefaultText();
        $hero->fillDefaultSlidesIfEmpty();

        return $hero->refresh();
    }

    public function fillMissingDefaultText(): self
    {
        $defaults = static::defaultAttributes();
        $updates = [];

        $title = is_array($this->title)
            ? $this->title
            : [];

        $thirdLine = is_array($this->third_line)
            ? $this->third_line
            : [];

        $subtitle = is_array($this->subtitle)
            ? $this->subtitle
            : [];

        foreach (['ar', 'en'] as $locale) {
            if (blank($title[$locale] ?? null)) {
                $title[$locale] = $defaults['title'][$locale];
                $updates['title'] = $title;
            }

            if (blank($thirdLine[$locale] ?? null)) {
                $thirdLine[$locale] = $defaults['third_line'][$locale];
                $updates['third_line'] = $thirdLine;
            }

            if (! array_key_exists($locale, $subtitle)) {
                $subtitle[$locale] = null;
                $updates['subtitle'] = $subtitle;
            }
        }

        if (blank($this->experience_years)) {
            $updates['experience_years'] =
                $defaults['experience_years'];
        }

        if ($updates !== []) {
            $this->forceFill($updates)->save();
        }

        return $this;
    }

    public function fillDefaultSlidesIfEmpty(): self
    {
        $updates = [];

        $slidesAr = is_array($this->slides)
            ? array_values(array_filter($this->slides))
            : [];

        if ($slidesAr === []) {
            $defaultSlidesAr =
                static::defaultSlideStoragePaths('ar');

            if ($defaultSlidesAr !== []) {
                $updates['slides'] = $defaultSlidesAr;
            }
        }

        $slidesEn = is_array($this->slides_en)
            ? array_values(array_filter($this->slides_en))
            : [];

        if ($slidesEn === []) {
            $defaultSlidesEn =
                static::defaultSlideStoragePaths('en');

            if ($defaultSlidesEn !== []) {
                $updates['slides_en'] = $defaultSlidesEn;
            }
        }

        if ($updates !== []) {
            $this->forceFill($updates)->save();
        }

        return $this;
    }

    public static function defaultSlideStoragePaths(
        string $locale = 'ar'
    ): array {
        $slides = [];

        $publicDirectory = $locale === 'en'
            ? 'assets/images/main/hero_en'
            : 'assets/images/main/hero';

        $storageDirectory = $locale === 'en'
            ? 'home/hero/default/en'
            : 'home/hero/default';

        foreach (range(1, 6) as $number) {
            foreach (
                ['jpg', 'jpeg', 'png', 'webp'] as $extension
            ) {
                $publicRelativePath =
                    "{$publicDirectory}/{$number}.{$extension}";

                $sourcePath =
                    public_path($publicRelativePath);

                if (! file_exists($sourcePath)) {
                    continue;
                }

                $storagePath =
                    "{$storageDirectory}/{$number}.{$extension}";

                if (
                    ! Storage::disk('public')
                        ->exists($storagePath)
                ) {
                    Storage::disk('public')->put(
                        $storagePath,
                        file_get_contents($sourcePath)
                    );
                }

                $slides[] = $storagePath;

                break;
            }
        }

        return $slides;
    }

    public static function publicDefaultSlideUrls(
        string $locale = 'ar'
    ): array {
        $slides = [];

        $publicDirectory = $locale === 'en'
            ? 'assets/images/main/hero_en'
            : 'assets/images/main/hero';

        foreach (range(1, 6) as $number) {
            foreach (
                ['jpg', 'jpeg', 'png', 'webp'] as $extension
            ) {
                $publicRelativePath =
                    "{$publicDirectory}/{$number}.{$extension}";

                if (
                    ! file_exists(
                        public_path($publicRelativePath)
                    )
                ) {
                    continue;
                }

                $slides[] = asset($publicRelativePath);

                break;
            }
        }

        return $slides;
    }
}