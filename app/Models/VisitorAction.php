<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorAction extends Model
{
    protected $fillable = [
        'visitor_stat_id',
        'ip',
        'page',
        'timestamp',
        'details',
    ];
    public $timestamps = false;

    public function visitorStat()
    {
        return $this->belongsTo(VisitorStat::class);
    }
}
