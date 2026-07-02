<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_vision_missions', function (Blueprint $table): void {
            if (! Schema::hasColumn('about_vision_missions', 'section_title_ar')) {
                $table->string('section_title_ar')->nullable()->after('id');
            }

            if (! Schema::hasColumn('about_vision_missions', 'section_title_en')) {
                $table->string('section_title_en')->nullable()->after('section_title_ar');
            }

            if (! Schema::hasColumn('about_vision_missions', 'vision_title_ar')) {
                $table->string('vision_title_ar')->nullable()->after('intro_text_en');
            }

            if (! Schema::hasColumn('about_vision_missions', 'vision_title_en')) {
                $table->string('vision_title_en')->nullable()->after('vision_title_ar');
            }

            if (! Schema::hasColumn('about_vision_missions', 'mission_title_ar')) {
                $table->string('mission_title_ar')->nullable()->after('vision_text_en');
            }

            if (! Schema::hasColumn('about_vision_missions', 'mission_title_en')) {
                $table->string('mission_title_en')->nullable()->after('mission_title_ar');
            }
        });
    }

    public function down(): void
    {
        Schema::table('about_vision_missions', function (Blueprint $table): void {
            $columns = array_values(array_filter([
                Schema::hasColumn('about_vision_missions', 'section_title_ar') ? 'section_title_ar' : null,
                Schema::hasColumn('about_vision_missions', 'section_title_en') ? 'section_title_en' : null,
                Schema::hasColumn('about_vision_missions', 'vision_title_ar') ? 'vision_title_ar' : null,
                Schema::hasColumn('about_vision_missions', 'vision_title_en') ? 'vision_title_en' : null,
                Schema::hasColumn('about_vision_missions', 'mission_title_ar') ? 'mission_title_ar' : null,
                Schema::hasColumn('about_vision_missions', 'mission_title_en') ? 'mission_title_en' : null,
            ]));

            if ($columns !== []) {
                $table->dropColumn($columns);
            }
        });
    }
};
