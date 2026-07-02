<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('partners_heroes', 'title_text_ar')) {
            Schema::table('partners_heroes', function (Blueprint $table) {
                $table->string('title_text_ar', 120)->nullable()->after('id');
            });
        }

        if (! Schema::hasColumn('partners_heroes', 'title_text_en')) {
            Schema::table('partners_heroes', function (Blueprint $table) {
                $table->string('title_text_en', 120)->nullable()->after('title_text_ar');
            });
        }

        DB::table('partners_heroes')
            ->whereNull('title_text_ar')
            ->update(['title_text_ar' => 'شركاؤنا']);

        DB::table('partners_heroes')
            ->whereNull('title_text_en')
            ->update(['title_text_en' => 'Our Partners']);
    }

    public function down(): void
    {
        Schema::table('partners_heroes', function (Blueprint $table) {
            if (Schema::hasColumn('partners_heroes', 'title_text_ar')) {
                $table->dropColumn('title_text_ar');
            }

            if (Schema::hasColumn('partners_heroes', 'title_text_en')) {
                $table->dropColumn('title_text_en');
            }
        });
    }
};
