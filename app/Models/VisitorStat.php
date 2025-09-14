<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorStat extends Model
{
    protected $fillable = [
        'ip', 'location', 'visits', 'last_visited', 'locked_out_until'
    ];
}
