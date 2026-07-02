<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFact extends Model
{
    public const DEFAULT_COUNTS = [
        'team_count' => '80',
        'vehicles_count' => '17',
        'warehouses_count' => '8',
        'pos_count' => '8',
    ];

    protected $fillable = [
        'team_count',
        'vehicles_count',
        'warehouses_count',
        'pos_count',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function firstOrCreateDefault(): self
    {
        $record = static::query()
            ->oldest('id')
            ->first();

        if ($record) {
            $missingDefaults = [];

            foreach (self::DEFAULT_COUNTS as $field => $defaultValue) {
                if (blank($record->{$field})) {
                    $missingDefaults[$field] = $defaultValue;
                }
            }

            if ($missingDefaults !== []) {
                $record->forceFill($missingDefaults)->save();
            }

            return $record->refresh();
        }

        return static::query()->create([
            ...self::DEFAULT_COUNTS,
            'is_active' => false,
        ]);
    }

    public static function normalizeCounter(?string $raw, string $fallback): array
    {
        $raw = trim((string) ($raw ?: $fallback));
        $hasPlus = str_contains($raw, '+');

        $target = (int) preg_replace('/\D+/', '', $raw);

        if ($target < 0) {
            $target = 0;
        }

        return [
            'prefix' => $hasPlus ? '+' : '',
            'target' => $target,
            'start' => $hasPlus ? '+0' : '0',
            'display' => ($hasPlus ? '+' : '') . $target,
        ];
    }
}
