<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_facts', function (Blueprint $table) {
            $table->id();

            // الأرقام فقط (تقبل +)
            $table->string('team_count')->nullable();        // مثال: 52+
            $table->string('vehicles_count')->nullable();    // مثال: 17+
            $table->string('warehouses_count')->nullable();  // مثال: 8
            $table->string('pos_count')->nullable();         // مثال: 8

            $table->boolean('is_active')->default(false)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_facts');
    }
};
