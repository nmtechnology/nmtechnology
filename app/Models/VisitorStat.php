<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorStat extends Model
{
    protected $fillable = [
        'ip', 'location', 'visits', 'last_visited', 'blocked_until', 'fail_count'
    ];

    // Optionally, add helper to check if blocked
    public function isBlocked()
    {
        return $this->blocked_until && now()->lessThan($this->blocked_until);
    }
}
