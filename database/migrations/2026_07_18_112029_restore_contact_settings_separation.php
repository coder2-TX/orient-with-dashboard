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

        $footerMapEmbedUrl = null;

        if (Schema::hasColumn('home_footers', 'map_embed_url')) {
            $footerMapEmbedUrl = DB::table('home_footers')
                ->orderBy('id')
                ->value('map_embed_url');
        }

        if (! Schema::hasColumn('home_footers', 'location_text_ar')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('location_text_ar', 190)->nullable();
            });
        }

        if (! Schema::hasColumn('home_footers', 'location_text_en')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('location_text_en', 190)->nullable();
            });
        }

        if (! Schema::hasColumn('home_footers', 'whatsapp_url')) {
            Schema::table('home_footers', function (Blueprint $table): void {
                $table->string('whatsapp_url', 500)->nullable();
            });
        }

        $hasWhatsappPhone = Schema::hasColumn('home_footers', 'whatsapp_phone');

        DB::table('home_footers')
            ->orderBy('id')
            ->get()
            ->each(function (object $footer) use ($hasWhatsappPhone): void {
                $updates = [];

                if (trim((string) ($footer->location_text_ar ?? '')) === '') {
                    $updates['location_text_ar'] = 'موقع الشركة';
                }

                if (trim((string) ($footer->location_text_en ?? '')) === '') {
                    $updates['location_text_en'] = 'Company Location';
                }

                if (trim((string) ($footer->whatsapp_url ?? '')) === '') {
                    $source = $hasWhatsappPhone
                        ? (string) ($footer->whatsapp_phone ?? '')
                        : '';

                    $digits = preg_replace('/\D+/', '', $source);

                    $updates['whatsapp_url'] = $digits !== ''
                        ? 'https://wa.me/' . $digits
                        : 'https://wa.me/967778080700';
                }

                if ($updates !== []) {
                    DB::table('home_footers')
                        ->where('id', $footer->id)
                        ->update($updates + ['updated_at' => now()]);
                }
            });

        if (Schema::hasTable('contact_settings_legacy') && ! Schema::hasTable('contact_settings')) {
            Schema::rename('contact_settings_legacy', 'contact_settings');
        }

        if (! Schema::hasTable('contact_settings')) {
            Schema::create('contact_settings', function (Blueprint $table): void {
                $table->id();
                $table->string('title_ar', 190);
                $table->string('title_en', 190);
                $table->text('lead_ar');
                $table->text('lead_en');
                $table->string('locations_title_ar', 190);
                $table->string('locations_title_en', 190);
                $table->text('locations_description_ar');
                $table->text('locations_description_en');
                $table->string('form_title_ar', 190);
                $table->string('form_title_en', 190);
                $table->text('form_description_ar');
                $table->text('form_description_en');
                $table->text('map_embed_url');
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        $requiredColumns = [
            'title_ar' => ['type' => 'string', 'length' => 190],
            'title_en' => ['type' => 'string', 'length' => 190],
            'lead_ar' => ['type' => 'text'],
            'lead_en' => ['type' => 'text'],
            'locations_title_ar' => ['type' => 'string', 'length' => 190],
            'locations_title_en' => ['type' => 'string', 'length' => 190],
            'locations_description_ar' => ['type' => 'text'],
            'locations_description_en' => ['type' => 'text'],
            'form_title_ar' => ['type' => 'string', 'length' => 190],
            'form_title_en' => ['type' => 'string', 'length' => 190],
            'form_description_ar' => ['type' => 'text'],
            'form_description_en' => ['type' => 'text'],
            'map_embed_url' => ['type' => 'text'],
            'is_active' => ['type' => 'boolean'],
        ];

        foreach ($requiredColumns as $column => $definition) {
            if (Schema::hasColumn('contact_settings', $column)) {
                continue;
            }

            Schema::table('contact_settings', function (Blueprint $table) use ($column, $definition): void {
                if ($definition['type'] === 'string') {
                    $table->string($column, $definition['length'])->nullable();
                } elseif ($definition['type'] === 'boolean') {
                    $table->boolean($column)->default(true);
                } else {
                    $table->text($column)->nullable();
                }
            });
        }

        $contactColumnsToDrop = [
            'email_label_ar',
            'email_label_en',
            'email',
            'phone_label_ar',
            'phone_label_en',
            'phone_display',
            'whatsapp_label_ar',
            'whatsapp_label_en',
            'whatsapp_display',
            'locations',
            'form_full_name_label_ar',
            'form_full_name_label_en',
            'form_full_name_placeholder_ar',
            'form_full_name_placeholder_en',
            'form_email_label_ar',
            'form_email_label_en',
            'form_email_placeholder_ar',
            'form_email_placeholder_en',
            'form_phone_label_ar',
            'form_phone_label_en',
            'form_phone_placeholder_ar',
            'form_phone_placeholder_en',
            'form_subject_label_ar',
            'form_subject_label_en',
            'form_subject_placeholder_ar',
            'form_subject_placeholder_en',
            'form_message_label_ar',
            'form_message_label_en',
            'form_message_placeholder_ar',
            'form_message_placeholder_en',
            'form_submit_label_ar',
            'form_submit_label_en',
            'map_title_ar',
            'map_title_en',
        ];

        $existingContactColumnsToDrop = array_values(array_filter(
            $contactColumnsToDrop,
            fn (string $column): bool => Schema::hasColumn('contact_settings', $column),
        ));

        if ($existingContactColumnsToDrop !== []) {
            Schema::table('contact_settings', function (Blueprint $table) use ($existingContactColumnsToDrop): void {
                $table->dropColumn($existingContactColumnsToDrop);
            });
        }


        $defaults = [
            'title_ar' => 'تواصل معنا',
            'title_en' => 'Contact Us',
            'lead_ar' => 'يسعدنا استقبال استفساراتكم ومقترحاتكم عبر القنوات التالية:',
            'lead_en' => 'We are happy to receive your inquiries and suggestions through the following channels:',
            'locations_title_ar' => 'مواقعنا',
            'locations_title_en' => 'Our Locations',
            'locations_description_ar' => 'تعمل أورينت يمن عبر شبكة فروع إقليمية، بما يتيح تواصلًا مباشرًا ودعمًا مستمرًا في الأسواق التي نعمل بها:',
            'locations_description_en' => 'Orient Yemen operates through a regional branch network, enabling direct communication and continuous support in the markets we serve:',
            'form_title_ar' => 'نموذج التواصل',
            'form_title_en' => 'Contact Form',
            'form_description_ar' => 'يمكنكم إرسال رسالتكم مباشرة عبر النموذج التالي، وسيتم التواصل معكم في أقرب وقت:',
            'form_description_en' => 'You can send your message directly using the form below, and we will get back to you as soon as possible:',
            'map_embed_url' => $this->firstFilled([
                $footerMapEmbedUrl,
                'https://www.google.com/maps?q=75XV%2BPHG%20%D8%B4%D8%B1%D9%83%D8%A9%20%D8%A3%D9%88%D8%B1%D9%8A%D9%86%D8%AA%20%D9%8A%D9%85%D9%86%2C%20Zero%20St%2C%20Sanaa%2C%20Yemen&z=18&output=embed',
            ]),
            'is_active' => true,
        ];

        $record = DB::table('contact_settings')->orderBy('id')->first();

        if (! $record) {
            DB::table('contact_settings')->insert($defaults + [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $updates = [];

            foreach ($defaults as $column => $value) {
                $current = $record->{$column} ?? null;

                if ($current === null || (is_string($current) && trim($current) === '')) {
                    $updates[$column] = $value;
                }
            }

            if ($updates !== []) {
                DB::table('contact_settings')
                    ->where('id', $record->id)
                    ->update($updates + ['updated_at' => now()]);
            }
        }


        $footerColumnsToDrop = array_values(array_filter(
            ['whatsapp_phone', 'map_embed_url'],
            fn (string $column): bool => Schema::hasColumn('home_footers', $column),
        ));

        if ($footerColumnsToDrop !== []) {
            Schema::table('home_footers', function (Blueprint $table) use ($footerColumnsToDrop): void {
                $table->dropColumn($footerColumnsToDrop);
            });
        }
    }

    public function down(): void
    {
        // This is a corrective migration that restores the intended separation.
        // It intentionally avoids deleting the recovered Contact Settings data.
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
};
