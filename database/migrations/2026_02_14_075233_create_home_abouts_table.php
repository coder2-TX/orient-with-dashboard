<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_abouts', function (Blueprint $table) {
            $table->id();

            // النصوص (AR/EN)
            $table->json('body')->nullable();

            // تفعيل/إيقاف
            $table->boolean('is_active')->default(false)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_abouts');
    }
};
