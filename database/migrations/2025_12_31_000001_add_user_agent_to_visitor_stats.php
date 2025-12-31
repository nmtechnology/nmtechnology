<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('visitor_stats', function (Blueprint $table) {
            if (!Schema::hasColumn('visitor_stats', 'user_agent')) {
                $table->text('user_agent')->nullable()->after('referer');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_stats', function (Blueprint $table) {
            if (Schema::hasColumn('visitor_stats', 'user_agent')) {
                $table->dropColumn('user_agent');
            }
        });
    }
};
