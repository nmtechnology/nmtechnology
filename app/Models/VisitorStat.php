<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorStat extends Model
{
    protected $fillable = [
        'ip', 'location', 'visits', 'last_visited', 'locked_out_until',
        'user_agent', 'referer', 'time_spent', 'attempts', 'math_status', 'visit_type', 'landing_page'
    ];
}
