<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomePartner extends Model
{
    public const DEFAULT_SUBTITLE_AR = 'نفخر بشراكاتنا مع موردين وشركات عالمية، ونؤمن بأن التكامل هو الأساس لبناء نجاح مستدام.';

    public const DEFAULT_SUBTITLE_EN = 'We take pride in our partnerships with global suppliers and companies, and we believe integration is the foundation of sustainable success.';

    protected $fillable = [
        'subtitle_ar',
        'subtitle_en',
        'logos',
        'is_active',
        'sort',
    ];

    protected $casts = [
        'logos' => 'array',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()->orderBy('sort')->orderBy('id')->first();

        $defaultLogos = static::copyDefaultLogosToStorage();

        if (! $record) {
            return static::query()->create([
                'subtitle_ar' => static::DEFAULT_SUBTITLE_AR,
                'subtitle_en' => static::DEFAULT_SUBTITLE_EN,
                'logos' => $defaultLogos,
                'is_active' => true,
                'sort' => 1,
            ]);
        }

        $updates = [];

        if (blank($record->subtitle_ar)) {
            $updates['subtitle_ar'] = static::DEFAULT_SUBTITLE_AR;
        }

        if (blank($record->subtitle_en)) {
            $updates['subtitle_en'] = static::DEFAULT_SUBTITLE_EN;
        }

        $logos = is_array($record->logos) ? array_values(array_filter($record->logos)) : [];

        if (count($logos) === 0 && count($defaultLogos) > 0) {
            $updates['logos'] = $defaultLogos;
        }

        if (blank($record->sort)) {
            $updates['sort'] = 1;
        }

        if ($updates !== []) {
            $record->forceFill($updates)->save();
            $record->refresh();
        }

        return $record;
    }

    public static function defaultLogoSourcePaths(): array
    {
        return [
            'assets/images/main/partners/logo-01.svg',
            'assets/images/main/partners/logo-10.svg',
            static::optimizedPublicImagePath('assets/images/main/partners/logo-02.png'),
            static::optimizedPublicImagePath('assets/images/main/partners/logo-03.png'),
            static::optimizedPublicImagePath('assets/images/main/partners/logo-04.png'),
            static::optimizedPublicImagePath('assets/images/main/partners/logo-05.png'),
            'assets/images/main/partners/logo-06.svg',
            static::optimizedPublicImagePath('assets/images/main/partners/logo-07.png'),
            static::optimizedPublicImagePath('assets/images/main/partners/logo-09.png'),
        ];
    }

    public static function defaultLogoAssetUrls(): array
    {
        return collect(static::defaultLogoSourcePaths())
            ->filter(fn (string $path): bool => File::exists(public_path($path)))
            ->map(fn (string $path): string => asset($path))
            ->values()
            ->all();
    }

    public static function copyDefaultLogosToStorage(): array
    {
        $disk = Storage::disk('public');
        $paths = [];

        foreach (static::defaultLogoSourcePaths() as $sourcePath) {
            $source = public_path($sourcePath);

            if (! File::exists($source)) {
                continue;
            }

            $targetPath = 'home/partners/default/' . basename($sourcePath);

            if (! $disk->exists($targetPath)) {
                $disk->put($targetPath, File::get($source));
            }

            $paths[] = $targetPath;
        }

        return $paths;
    }

    public function landingLogoUrls(): array
    {
        $logos = is_array($this->logos) ? array_values(array_filter($this->logos)) : [];

        if (count($logos) === 0) {
            return static::defaultLogoAssetUrls();
        }

        return collect($logos)
            ->map(fn (string $path): string => static::pathToUrl($path))
            ->values()
            ->all();
    }

    protected static function optimizedPublicImagePath(string $path): string
    {
        $webpPath = preg_replace('/\.(png|jpe?g)$/i', '.webp', $path);

        if ($webpPath && $webpPath !== $path && File::exists(public_path($webpPath))) {
            return $webpPath;
        }

        return $path;
    }

    protected static function pathToUrl(string $path): string
    {
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }
}
