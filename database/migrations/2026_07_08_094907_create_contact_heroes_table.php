<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_heroes', function (Blueprint $table) {
            $table->id();

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->string('pre_ar')->nullable();
            $table->string('pre_en')->nullable();

            $table->string('company_ar')->nullable();
            $table->string('company_en')->nullable();

            $table->string('hero_image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_heroes');
    }
};