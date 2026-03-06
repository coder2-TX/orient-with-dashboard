<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();

            // نخزن الرقم بصيغة أرقام فقط قدر الإمكان: 967778080700
            $table->string('whatsapp_number', 30)->nullable();

            // نص العرض: +967 778 080 700
            $table->string('whatsapp_display', 60)->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
