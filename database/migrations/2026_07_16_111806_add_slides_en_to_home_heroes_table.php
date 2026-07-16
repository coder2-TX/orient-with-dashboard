<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_heroes', function (Blueprint $table): void {
            $table
                ->json('slides_en')
                ->nullable()
                ->after('slides');
        });
    }

    public function down(): void
    {
        Schema::table('home_heroes', function (Blueprint $table): void {
            $table->dropColumn('slides_en');
        });
    }
};