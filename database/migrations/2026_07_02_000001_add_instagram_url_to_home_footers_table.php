<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_footers', function (Blueprint $table) {
            if (! Schema::hasColumn('home_footers', 'instagram_url')) {
                $table->string('instagram_url')->nullable()->after('facebook_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('home_footers', function (Blueprint $table) {
            if (Schema::hasColumn('home_footers', 'instagram_url')) {
                $table->dropColumn('instagram_url');
            }
        });
    }
};
