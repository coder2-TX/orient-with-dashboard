<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_why_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('sort_order')->default(1)->index();

            // النص فقط داخل الكرت
            $table->text('text_ar')->nullable();
            $table->text('text_en')->nullable();

            $table->boolean('is_active')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_why_items');
    }
};
