<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_partners', function (Blueprint $table) {
            $table->id();

            $table->text('subtitle_ar')->nullable();
            $table->text('subtitle_en')->nullable();

            // paths stored like: ["home/partners/xxx.svg", "home/partners/yyy.png", ...]
            $table->json('logos')->nullable();

            $table->boolean('is_active')->default(false);
            $table->unsignedInteger('sort')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_partners');
    }
};
