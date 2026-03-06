<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('about_vision_missions', function (Blueprint $table) {
            $table->id();

            // النص تحت العنوان (AR/EN)
            $table->text('intro_text_ar')->nullable();
            $table->text('intro_text_en')->nullable();

            // نص الرؤية (AR/EN)
            $table->text('vision_text_ar')->nullable();
            $table->text('vision_text_en')->nullable();

            // نص الرسالة (AR/EN)
            $table->text('mission_text_ar')->nullable();
            $table->text('mission_text_en')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_vision_missions');
    }
};
