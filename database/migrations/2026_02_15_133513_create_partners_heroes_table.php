<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('partners_heroes', function (Blueprint $table) {
            $table->id();

            $table->text('lead_text_ar')->nullable();
            $table->text('lead_text_en')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners_heroes');
    }
};
