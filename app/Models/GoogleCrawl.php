<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleCrawl extends Model
{
    protected $fillable = [
        'bot_type',
        'user_agent',
        'ip_address',
        'url',
        'method',
        'referer',
        'is_verified',
        'headers',
        'crawled_at',
    ];

    protected $casts = [
        'crawled_at' => 'datetime',
        'headers' => 'array',
        'is_verified' => 'boolean',
    ];

    /**
     * Scope to get only verified Google crawls
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope to get crawls by bot type
     */
    public function scopeByBotType($query, $botType)
    {
        return $query->where('bot_type', $botType);
    }

    /**
     * Scope to get recent crawls
     */
    public function scopeRecent($query, $hours = 24)
    {
        return $query->where('crawled_at', '>=', now()->subHours($hours));
    }
}
