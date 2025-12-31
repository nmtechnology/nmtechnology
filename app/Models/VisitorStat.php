<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorStat extends Model
{
    protected $fillable = [
        'ip', 'location', 'visits', 'last_visited', 'locked_out_until', 'last_notified_at',
        'user_agent', 'referer', 'time_spent', 'attempts', 'math_status', 'visit_type', 'landing_page'
    ];
    
    protected $casts = [
        'last_visited' => 'datetime',
        'locked_out_until' => 'datetime',
        'last_notified_at' => 'datetime',
    ];
}
