<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_footers', function (Blueprint $table) {
            $table->id();

            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('location_text_ar')->nullable();
            $table->string('location_text_en')->nullable();
            $table->string('location_url')->nullable();

            // قائمة "مواقعنا" (كل عنصر: name_ar + name_en)
            $table->json('locations')->nullable();

            // روابط السوشيال (خزن روابط كاملة)
            $table->string('x_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('whatsapp_url')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_footers');
    }
};
