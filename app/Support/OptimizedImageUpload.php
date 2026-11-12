<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use RuntimeException;

final class OptimizedImageUpload
{
    /** Save raster uploads as WebP; preserve SVG icons as SVG. */
    public static function store(TemporaryUploadedFile $file, string $directory, int $maxWidth = 1600): string
    {
        $directory = trim($directory, '/');
        $path = $file->getRealPath();
        if (! is_string($path) || ! is_file($path)) {
            throw new RuntimeException('Uploaded image cannot be read.');
        }

        $mime = (new \finfo(FILEINFO_MIME_TYPE))->file($path);
        if ($mime === 'image/svg+xml' || ($mime === 'text/xml' && strtolower($file->getClientOriginalExtension()) === 'svg')) {
            // SVG is an existing supported icon/logo format. Keep it as vector.
            return $file->storePublicly($directory, 'public');
        }

        if (! in_array($mime, ['image/jpeg', 'image/png', 'image/webp'], true)) {
            throw new RuntimeException('Unsupported image format.');
        }
        if (! extension_loaded('gd') || ! function_exists('imagewebp') || ! function_exists('imagecreatefromstring')) {
            throw new RuntimeException('Image optimization is unavailable on the server (GD/WebP).');
        }
        $info = @getimagesize($path);
        if (! $info || $info[0] < 1 || $info[1] < 1 || $info[0] * $info[1] > 25000000) {
            throw new RuntimeException('Image dimensions are invalid or too large.');
        }
        $source = @imagecreatefromstring(file_get_contents($path));
        if ($source === false) {
            throw new RuntimeException('Unable to decode image.');
        }
        try {
            $width = imagesx($source);
            $height = imagesy($source);
            if ($width > $maxWidth) {
                $newWidth = $maxWidth;
                $newHeight = max(1, (int) round($height * $maxWidth / $width));
                $resized = imagecreatetruecolor($newWidth, $newHeight);
                imagealphablending($resized, false);
                imagesavealpha($resized, true);
                imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                imagedestroy($source);
                $source = $resized;
            }
            imagepalettetotruecolor($source);
            imagealphablending($source, false);
            imagesavealpha($source, true);
            ob_start();
            try {
                $encoded = imagewebp($source, null, 85);
                $bytes = ob_get_contents();
            } finally {
                ob_end_clean();
            }
            if (! $encoded || ! is_string($bytes) || $bytes === '') {
                throw new RuntimeException('Unable to encode WebP image.');
            }
        } finally {
            imagedestroy($source);
        }
        $target = $directory . '/' . Str::ulid() . '.webp';
        if (! Storage::disk('public')->put($target, $bytes, ['visibility' => 'public'])) {
            throw new RuntimeException('Unable to store optimized image.');
        }
        return $target;
    }
}
