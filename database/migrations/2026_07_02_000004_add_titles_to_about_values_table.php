<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('about_values', 'title_text_ar')) {
            Schema::table('about_values', function (Blueprint $table) {
                $table->string('title_text_ar')->nullable();
            });
        }

        if (! Schema::hasColumn('about_values', 'title_text_en')) {
            Schema::table('about_values', function (Blueprint $table) {
                $table->string('title_text_en')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('about_values', function (Blueprint $table) {
            if (Schema::hasColumn('about_values', 'title_text_ar')) {
                $table->dropColumn('title_text_ar');
            }

            if (Schema::hasColumn('about_values', 'title_text_en')) {
                $table->dropColumn('title_text_en');
            }
        });
    }
};
