<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorStat;

class VisitorStatsController extends Controller
{
    public function index()
    {
        $stats = VisitorStat::orderBy('last_visited', 'desc')->get();
        $totalVisits = VisitorStat::sum('visits');
        $uniqueVisitors = VisitorStat::count();
        $locations = VisitorStat::select('location')->groupBy('location')->get()->pluck('location');
        return view('visitor_stats', compact('stats', 'totalVisits', 'uniqueVisitors', 'locations'));
    }
}
