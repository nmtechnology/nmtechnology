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
            // Add locked_out_until if it doesn't exist
            if (!Schema::hasColumn('visitor_stats', 'locked_out_until')) {
                $table->timestamp('locked_out_until')->nullable();
            }
            // Add last_notified_at
            $table->timestamp('last_notified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_stats', function (Blueprint $table) {
            $table->dropColumn('last_notified_at');
        });
    }
};
