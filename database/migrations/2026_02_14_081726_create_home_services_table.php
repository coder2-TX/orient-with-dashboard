<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_services', function (Blueprint $table) {
            $table->id();

            // النص تحت العنوان (AR/EN)
            $table->json('intro')->nullable();

            // عناصر الخدمات (قائمة): icon + title(ar/en)
            $table->json('items')->nullable();

            // تفعيل/إيقاف السجل
            $table->boolean('is_active')->default(false)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_services');
    }
};
