<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('contact_heroes')) {
            throw new RuntimeException(
                'The contact_heroes table does not exist.'
            );
        }

        if (
            ! Schema::hasColumn(
                'contact_heroes',
                'hero_image_en'
            )
        ) {
            Schema::table(
                'contact_heroes',
                function (Blueprint $table): void {
                    $table
                        ->string('hero_image_en')
                        ->nullable()
                        ->after('hero_image');
                }
            );
        }
    }

    public function down(): void
    {
        if (
            Schema::hasTable('contact_heroes')
            && Schema::hasColumn(
                'contact_heroes',
                'hero_image_en'
            )
        ) {
            Schema::table(
                'contact_heroes',
                function (Blueprint $table): void {
                    $table->dropColumn('hero_image_en');
                }
            );
        }
    }
};
