<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_values', function (Blueprint $table) {
            $table->id();

            // النص تحت "قيمنا"
            $table->string('intro_text_ar')->nullable();
            $table->string('intro_text_en')->nullable();

            // عناصر القيم (حد أقصى 6) كل عنصر: icon, title_ar, title_en, desc_ar, desc_en
            $table->json('items')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_values');
    }
};
