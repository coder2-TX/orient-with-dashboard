<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('contact_settings')) {
            throw new \RuntimeException('The contact_settings table does not exist.');
        }

        if (! Schema::hasColumn('contact_settings', 'whatsapp_display')) {
            Schema::table('contact_settings', function (Blueprint $table): void {
                $table->string('whatsapp_display', 60)->nullable();
            });
        }

        DB::table('contact_settings')
            ->orderBy('id')
            ->get()
            ->each(function (object $record): void {
                if (trim((string) ($record->whatsapp_display ?? '')) !== '') {
                    return;
                }

                DB::table('contact_settings')
                    ->where('id', $record->id)
                    ->update([
                        'whatsapp_display' => '+967 778 080 700',
                        'updated_at' => now(),
                    ]);
            });
    }

    public function down(): void
    {
        // Keep the receiver number to avoid losing the contact form destination.
    }
};
