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
        Schema::create('google_crawls', function (Blueprint $table) {
            $table->id();
            $table->string('bot_type')->index(); // e.g., 'Googlebot', 'Googlebot-Image'
            $table->text('user_agent');
            $table->string('ip_address', 45)->index(); // IPv4 or IPv6
            $table->text('url'); // Full URL that was crawled
            $table->string('method', 10)->default('GET'); // HTTP method
            $table->text('referer')->nullable(); // Referrer URL if present
            $table->boolean('is_verified')->default(false); // Verified via reverse DNS
            $table->json('headers')->nullable(); // All request headers
            $table->timestamp('crawled_at')->index(); // When the crawl happened
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_crawls');
    }
};
