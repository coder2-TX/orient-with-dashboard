<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_page_products', function (Blueprint $table) {
            $table->id();

            $table->string('default_key')->nullable()->unique();
            $table->unsignedInteger('sort_order')->default(1);

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->text('desc_ar')->nullable();
            $table->text('desc_en')->nullable();

            $table->string('image')->nullable();
            $table->string('default_image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_page_products');
    }
};