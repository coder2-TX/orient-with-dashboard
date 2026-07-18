<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('home_footers')) {
            throw new \RuntimeException('The home_footers table does not exist.');
        }

        if (! Schema::hasColumn('home_footers', 'whatsapp_phone')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('whatsapp_phone', 60)->nullable()->after('phone');
            });
        }

        if (! Schema::hasColumn('home_footers', 'map_embed_url')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->text('map_embed_url')->nullable()->after('location_url');
            });
        }

        $contact = Schema::hasTable('contact_settings')
            ? DB::table('contact_settings')->orderBy('id')->first()
            : null;

        $footer = DB::table('home_footers')->orderBy('id')->first();

        $defaultLocations = json_encode([
            ['name_ar' => 'اليمن', 'name_en' => 'Yemen'],
            ['name_ar' => 'المملكة العربية السعودية', 'name_en' => 'Saudi Arabia'],
            ['name_ar' => 'إندونيسيا', 'name_en' => 'Indonesia'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $locations = $this->firstUsableLocations([
            $footer?->locations ?? null,
            $contact?->locations ?? null,
            $defaultLocations,
        ]);

        $email = $this->firstFilled([
            $footer?->email ?? null,
            $contact?->email ?? null,
            'info@orientyemen.com',
        ]);

        $phone = $this->firstFilled([
            $footer?->phone ?? null,
            $contact?->phone_display ?? null,
            '+967 734888880',
        ]);

        $whatsappPhone = $this->firstFilled([
            $footer?->whatsapp_phone ?? null,
            $this->phoneFromWhatsappUrl($footer?->whatsapp_url ?? null),
            $contact?->whatsapp_display ?? null,
            '+967 778 080 700',
        ]);

        $mapEmbedUrl = $this->firstFilled([
            $footer?->map_embed_url ?? null,
            $contact?->map_embed_url ?? null,
            'https://www.google.com/maps?q=75XV%2BPHG%20%D8%B4%D8%B1%D9%83%D8%A9%20%D8%A3%D9%88%D8%B1%D9%8A%D9%86%D8%AA%20%D9%8A%D9%85%D9%86%2C%20Zero%20St%2C%20Sanaa%2C%20Yemen&z=18&output=embed',
        ]);

        $payload = [
            'email' => $email,
            'phone' => $phone,
            'whatsapp_phone' => $whatsappPhone,
            'location_url' => $this->firstFilled([
                $footer?->location_url ?? null,
                'https://maps.app.goo.gl/TW3M3gi3dqN273LG6',
            ]),
            'map_embed_url' => $mapEmbedUrl,
            'locations' => $locations,
            'facebook_url' => $this->firstFilled([
                $footer?->facebook_url ?? null,
                'https://www.facebook.com/share/1CNj9hfQ9o/',
            ]),
            'instagram_url' => $this->firstFilled([
                $footer?->instagram_url ?? null,
                'https://www.instagram.com/orientyemen?igsh=NHZqaTFsNDJmY2Jz',
            ]),
            'x_url' => $footer?->x_url ?? null,
            'is_active' => $footer?->is_active ?? true,
            'updated_at' => now(),
        ];

        if ($footer) {
            DB::table('home_footers')
                ->where('id', $footer->id)
                ->update($this->onlyExistingColumns('home_footers', $payload));
        } else {
            $payload += [
                'location_text_ar' => 'موقع الشركة',
                'location_text_en' => 'Company Location',
                'whatsapp_url' => 'https://wa.me/' . preg_replace('/\D+/', '', $whatsappPhone),
                'created_at' => now(),
            ];

            DB::table('home_footers')
                ->insert($this->onlyExistingColumns('home_footers', $payload));
        }

        $columnsToDrop = [];

        foreach (['location_text_ar', 'location_text_en', 'whatsapp_url'] as $column) {
            if (Schema::hasColumn('home_footers', $column)) {
                $columnsToDrop[] = $column;
            }
        }

        if ($columnsToDrop !== []) {
            Schema::table('home_footers', function (Blueprint $table) use ($columnsToDrop): void {
                $table->dropColumn($columnsToDrop);
            });
        }

        if (Schema::hasTable('contact_settings') && Schema::hasTable('contact_settings_legacy')) {
            throw new \RuntimeException(
                'Both contact_settings and contact_settings_legacy exist. Resolve the duplicate tables before continuing.'
            );
        }

        if (Schema::hasTable('contact_settings')) {
            Schema::rename('contact_settings', 'contact_settings_legacy');
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('home_footers')) {
            return;
        }

        if (! Schema::hasColumn('home_footers', 'location_text_ar')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('location_text_ar', 190)->nullable()->after('phone');
            });
        }

        if (! Schema::hasColumn('home_footers', 'location_text_en')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('location_text_en', 190)->nullable()->after('location_text_ar');
            });
        }

        if (! Schema::hasColumn('home_footers', 'whatsapp_url')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('whatsapp_url', 500)->nullable()->after('instagram_url');
            });
        }

        DB::table('home_footers')
            ->orderBy('id')
            ->get()
            ->each(function (object $footer): void {
                $digits = preg_replace('/\D+/', '', (string) ($footer->whatsapp_phone ?? ''));

                DB::table('home_footers')
                    ->where('id', $footer->id)
                    ->update([
                        'location_text_ar' => 'موقع الشركة',
                        'location_text_en' => 'Company Location',
                        'whatsapp_url' => $digits !== '' ? 'https://wa.me/' . $digits : null,
                    ]);
            });

        if (Schema::hasTable('contact_settings_legacy') && Schema::hasTable('contact_settings')) {
            throw new \RuntimeException(
                'Both contact_settings_legacy and contact_settings exist. Resolve the duplicate tables before rollback.'
            );
        }

        if (Schema::hasTable('contact_settings_legacy')) {
            Schema::rename('contact_settings_legacy', 'contact_settings');
        }

        $columnsToDrop = [];

        foreach (['whatsapp_phone', 'map_embed_url'] as $column) {
            if (Schema::hasColumn('home_footers', $column)) {
                $columnsToDrop[] = $column;
            }
        }

        if ($columnsToDrop !== []) {
            Schema::table('home_footers', function (Blueprint $table) use ($columnsToDrop): void {
                $table->dropColumn($columnsToDrop);
            });
        }
    }

    private function firstFilled(array $values): ?string
    {
        foreach ($values as $value) {
            if ($value === null) {
                continue;
            }

            $value = trim((string) $value);

            if ($value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function firstUsableLocations(array $values): string
    {
        foreach ($values as $value) {
            if (is_array($value)) {
                $decoded = $value;
            } elseif (is_string($value) && trim($value) !== '') {
                $decoded = json_decode($value, true);
            } else {
                $decoded = null;
            }

            if (! is_array($decoded) || $decoded === []) {
                continue;
            }

            $usable = collect($decoded)
                ->filter(fn (mixed $location): bool => is_array($location))
                ->filter(function (array $location): bool {
                    return trim((string) ($location['name_ar'] ?? '')) !== ''
                        || trim((string) ($location['name_en'] ?? '')) !== '';
                })
                ->values()
                ->all();

            if ($usable !== []) {
                return json_encode($usable, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        }

        return '[]';
    }

    private function phoneFromWhatsappUrl(mixed $value): ?string
    {
        if (! is_string($value) || trim($value) === '') {
            return null;
        }

        $digits = preg_replace('/\D+/', '', $value);

        return $digits !== '' ? '+' . $digits : null;
    }

    private function onlyExistingColumns(string $table, array $payload): array
    {
        $columns = array_flip(Schema::getColumnListing($table));

        return array_filter(
            $payload,
            static fn (string $column): bool => isset($columns[$column]),
            ARRAY_FILTER_USE_KEY,
        );
    }
};
