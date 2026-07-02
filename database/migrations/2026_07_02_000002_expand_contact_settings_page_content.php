<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('contact_settings', 'title_ar')) {
                $table->string('title_ar', 190)->nullable()->after('id');
            }

            if (! Schema::hasColumn('contact_settings', 'title_en')) {
                $table->string('title_en', 190)->nullable()->after('title_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'lead_ar')) {
                $table->text('lead_ar')->nullable()->after('title_en');
            }

            if (! Schema::hasColumn('contact_settings', 'lead_en')) {
                $table->text('lead_en')->nullable()->after('lead_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'email_label_ar')) {
                $table->string('email_label_ar', 120)->nullable()->after('lead_en');
            }

            if (! Schema::hasColumn('contact_settings', 'email_label_en')) {
                $table->string('email_label_en', 120)->nullable()->after('email_label_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'email')) {
                $table->string('email', 190)->nullable()->after('email_label_en');
            }

            if (! Schema::hasColumn('contact_settings', 'phone_label_ar')) {
                $table->string('phone_label_ar', 120)->nullable()->after('email');
            }

            if (! Schema::hasColumn('contact_settings', 'phone_label_en')) {
                $table->string('phone_label_en', 120)->nullable()->after('phone_label_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'phone_display')) {
                $table->string('phone_display', 60)->nullable()->after('phone_label_en');
            }

            if (! Schema::hasColumn('contact_settings', 'whatsapp_label_ar')) {
                $table->string('whatsapp_label_ar', 120)->nullable()->after('phone_display');
            }

            if (! Schema::hasColumn('contact_settings', 'whatsapp_label_en')) {
                $table->string('whatsapp_label_en', 120)->nullable()->after('whatsapp_label_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'locations_title_ar')) {
                $table->string('locations_title_ar', 190)->nullable()->after('whatsapp_display');
            }

            if (! Schema::hasColumn('contact_settings', 'locations_title_en')) {
                $table->string('locations_title_en', 190)->nullable()->after('locations_title_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'locations_description_ar')) {
                $table->text('locations_description_ar')->nullable()->after('locations_title_en');
            }

            if (! Schema::hasColumn('contact_settings', 'locations_description_en')) {
                $table->text('locations_description_en')->nullable()->after('locations_description_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'locations')) {
                $table->json('locations')->nullable()->after('locations_description_en');
            }

            if (! Schema::hasColumn('contact_settings', 'form_title_ar')) {
                $table->string('form_title_ar', 190)->nullable()->after('locations');
            }

            if (! Schema::hasColumn('contact_settings', 'form_title_en')) {
                $table->string('form_title_en', 190)->nullable()->after('form_title_ar');
            }

            if (! Schema::hasColumn('contact_settings', 'form_description_ar')) {
                $table->text('form_description_ar')->nullable()->after('form_title_en');
            }

            if (! Schema::hasColumn('contact_settings', 'form_description_en')) {
                $table->text('form_description_en')->nullable()->after('form_description_ar');
            }

            $shortTextColumns = [
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
                'form_submit_label_ar',
                'form_submit_label_en',
                'map_title_ar',
                'map_title_en',
            ];

            foreach ($shortTextColumns as $column) {
                if (! Schema::hasColumn('contact_settings', $column)) {
                    $table->string($column, 190)->nullable();
                }
            }

            if (! Schema::hasColumn('contact_settings', 'form_message_placeholder_ar')) {
                $table->text('form_message_placeholder_ar')->nullable();
            }

            if (! Schema::hasColumn('contact_settings', 'form_message_placeholder_en')) {
                $table->text('form_message_placeholder_en')->nullable();
            }

            if (! Schema::hasColumn('contact_settings', 'map_embed_url')) {
                $table->text('map_embed_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $columns = [
                'title_ar',
                'title_en',
                'lead_ar',
                'lead_en',
                'email_label_ar',
                'email_label_en',
                'email',
                'phone_label_ar',
                'phone_label_en',
                'phone_display',
                'whatsapp_label_ar',
                'whatsapp_label_en',
                'locations_title_ar',
                'locations_title_en',
                'locations_description_ar',
                'locations_description_en',
                'locations',
                'form_title_ar',
                'form_title_en',
                'form_description_ar',
                'form_description_en',
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
                'map_embed_url',
                'map_title_ar',
                'map_title_en',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('contact_settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
