<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_heroes', function (Blueprint $table) {
            $table->id();

            // نصوص متعددة اللغات (AR/EN)
            $table->json('title')->nullable();        // h1
            $table->json('subtitle')->nullable();     // h2 (يمكن يحتوي {years})
            $table->json('third_line')->nullable();   // h3

            // الرقم (بدل 15)
            $table->unsignedSmallInteger('experience_years')->nullable();

            // صور السلايدر (مفتوحة غير محددة)
            $table->json('slides')->nullable();

            // زر تفعيل/إيقاف
            $table->boolean('is_active')->default(false)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_heroes');
    }
};
