<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partners_trusts', function (Blueprint $table) {
            $table->id();

            // items: [{icon,title_ar,desc_ar,title_en,desc_en}, ...]
            $table->json('items')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort')->default(0);

            $table->timestamps();

            $table->index(['is_active', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners_trusts');
    }
};
