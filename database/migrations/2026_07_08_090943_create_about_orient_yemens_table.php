<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_orient_yemens', function (Blueprint $table) {
            $table->id();

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->text('lead_ar')->nullable();
            $table->text('lead_en')->nullable();

            $table->text('paragraph_1_ar')->nullable();
            $table->text('paragraph_1_en')->nullable();

            $table->text('paragraph_2_ar')->nullable();
            $table->text('paragraph_2_en')->nullable();

            $table->string('branches_label_ar')->nullable();
            $table->string('branches_label_en')->nullable();

            $table->json('branches')->nullable();

            $table->text('closing_ar')->nullable();
            $table->text('closing_en')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_orient_yemens');
    }
};