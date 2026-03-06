<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_methodologies', function (Blueprint $table) {
            $table->id();

            // عناصر الكروت (حد أقصى 5) كل عنصر:
            // icon, title_ar, desc_ar, title_en, desc_en
            $table->json('items')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_methodologies');
    }
};
