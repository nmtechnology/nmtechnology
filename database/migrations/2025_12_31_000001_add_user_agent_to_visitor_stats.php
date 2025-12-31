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
            // Add all potentially missing columns for visitor tracking
            if (!Schema::hasColumn('visitor_stats', 'referer')) {
                $table->text('referer')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'user_agent')) {
                $table->text('user_agent')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'time_spent')) {
                $table->integer('time_spent')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'attempts')) {
                $table->integer('attempts')->default(0);
            }
            if (!Schema::hasColumn('visitor_stats', 'math_status')) {
                $table->string('math_status')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'visit_type')) {
                $table->string('visit_type')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'landing_page')) {
                $table->string('landing_page')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'last_notified_at')) {
                $table->timestamp('last_notified_at')->nullable();
            }
            if (!Schema::hasColumn('visitor_stats', 'locked_out_until')) {
                $table->timestamp('locked_out_until')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_stats', function (Blueprint $table) {
            $columns = ['referer', 'user_agent', 'time_spent', 'attempts', 'math_status', 'visit_type', 'landing_page', 'last_notified_at', 'locked_out_until'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('visitor_stats', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
